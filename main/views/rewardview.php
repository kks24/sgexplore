<?php
require '.././libs/Slim/Slim.php';
require '../Models/Rewards.php';
require '../include/Functions.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->get('/loadrewards', function() use ($app) {
    $rewards = new rewards();
    $result = $rewards->fetchall();
    if ($result != NULL) {
        $response["error"] = false;
        $count = $result->num_rows;
        if ($count == 0){
            $response["Null"] = true;
            $response["message"] = "No rewards";
        }
        else{
            $response["Null"] = false;
            $response["message"] = "Current Rewards";
            $response["rewards"] = array();
            // looping through result and preparing tasks array
            while ($row= $result->fetch_assoc()) {
                $tmp = array();
                $tmp["rewardId"] = $row["reward_id"];
                $tmp["rewardName"] = $row["reward_name"];
                $tmp["rewardImage"] = $row["reward_image"];
                $tmp["companyName"] = $row["company_name"];
                $tmp["quantity"] = $row["quantity"];
                $tmp["points"] = $row["points_required"];
                $tmp["startdate"] = $row["start_time"];
                $tmp["enddate"] = $row["end_time"];
                array_push($response["rewards"], $tmp);
            }
        }
    }
    else{
        $response["error"] = true;
        $response["message"] = "Error connecting to Database. Please Try Again.";
    }
    Functions::echoRespnse(200, $response);
});

$app->get('/getmyrewards', function() use ($app) {
	Functions::verifyRequiredParams(array('userid'));
	
	$response = array();
	$user_id = $app->request->post('userid');
    $rewards = new rewards();
    $result = $rewards->getMyRewards($user_id);
    if ($result != NULL) {
        $response["error"] = false;
        $count = $result->num_rows;
        if ($count == 0){
            $response["Null"] = true;
            $response["message"] = "You have currently no rewards avaliable in your account";
        }
        else{
            $response["Null"] = false;
            $response["message"] = "My Current Rewards";
            $response["rewards"] = array();
            // looping through result and preparing tasks array
            while ($row= $result->fetch_assoc()) {
                $tmp = array();
                $tmp["rewardId"] = $row["reward_id"];
                $tmp["rewardName"] = $row["reward_name"];
                $tmp["rewardImage"] = $row["reward_image"];
                $tmp["companyName"] = $row["company_name"];
                $tmp["points"] = $row["points_required"];
                $tmp["startdate"] = $row["start_time"];
                $tmp["enddate"] = $row["end_time"];
                array_push($response["rewards"], $tmp);
            }
        }
    }
    else{
        $response["error"] = true;
        $response["message"] = "Error connecting to Database. Please Try Again.";
    }
    Functions::echoRespnse(200, $response);
});
	
	
	$app->post('/redeem', function() use ($app) {
            // check for required params
			$Id = Auth($app);
            Functions::verifyRequiredParams(array('rewardid', 'userid', 'points'));
 
            $response = array();
            $reward_id = $app->request->post('rewardid');
			$user_id = $app->request->post('userid');
			$points = $app->request->post('points');
			$rewards = new rewards();

            $vaildRedeem = $rewards->checkSufficientPoints($user_id, $points);
 
            if ($vaildRedeem != NULL) {
				if($vaildRedeem == 1){
					$response["error"] = true;
					$response["message"] = "Due to insufficient Points, you are unable to redeem this reward.";
				}
				else{
					$getRedemptionCode = $rewards->redeemReward($reward_id, $user_id, $points);
					$response["error"] = false;
					$response["message"] = "Reward Redeemed successfully";
					$response["redemptionCode"] = $getRedemptionCode;
				}
            } else {
                $response["error"] = true;
                $response["message"] = "Error connecting to Database. Please Try Again.";
            }
            Functions::echoRespnse(201, $response);
        });
		
		
		$app->post('/myrewards', function() use ($app) {
            // check for required params
            Functions::verifyRequiredParams(array('userid'));
 
            $response = array();
			$user_id = $app->request->post('userid');
			$rewards = new rewards();

            $result = $rewards->getMyRewards($user_id);
 
            if ($result != NULL) {
				$response["error"] = false;
				$count = $result->num_rows;
				if ($count == 0){
					$response["Null"] = true;
					$response["message"] = "No rewards in account";
			}
			else{
				$response["Null"] = false;
				$response["message"] = "My Current Rewards";
				$response["myrewards"] = array();
				// looping through result and preparing tasks array
				while ($row= $result->fetch_assoc()) {
					$tmp = array();
					$tmp["rewardId"] = $row["reward_id"];
					$tmp["rewardName"] = $row["reward_name"];
					$tmp["rewardImage"] = $row["reward_image"];
					$tmp["companyName"] = $row["company_name"];
					$tmp["dateRedeemed"] = $row["date_redeemed"];
					$tmp["redemption_code"] = $row["redemption_code"];
					$tmp["points"] = $row["points"];
					$tmp["dateUsed"] = $row["date_used"];
					$tmp["expiryDate"] = $row["end_time"];
					array_push($response["myrewards"], $tmp);
				}
			}
			}
			else{
				$response["error"] = true;
				$response["message"] = "Error connecting to Database. Please Try Again.";
			}
			Functions::echoRespnse(200, $response);
        });


		
function Auth($app){
    $route = $app->router()->getCurrentRoute();
    $Id=(Functions::authenticate($route));
    $Id = $Id['user_id'];
    return $Id;
}

$app->run();
?>