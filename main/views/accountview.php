<?php


require '.././libs/Slim/Slim.php';
require '../Models/Account.php';
require '../include/Functions.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

/**
 * Get account details
 * Requires API key in header for authentication - using authenticate function
 */
$app->get('/account',function () use ($app) {
            $Id = Auth($app);
            $user = new Account();
            $result = $user->fetchdetails($Id);
            if ($result != NULL) {
            $response["error"] = false;
            $count = $result->num_rows;
            $response["message"] = "Details";
            $response["User"] = array();
            // looping through result and preparing tasks array
            while ($row= $result->fetch_assoc()) {
                $tmp = array();
                $tmp["name"] = $row["full_name"];
                $tmp["email"] = $row["email"];
                $tmp["contact_num"] = $row["contact_num"];
                $tmp["address"] = $row["address"];
                $tmp["points"] = $row["points"];
                array_push($response["User"], $tmp);
            }
    }
    else{
        $response["error"] = true;
        $response["message"] = "Error connecting to Database";
    }
    Functions::echoRespnse(200, $response);});
/**
 *  Update account details
 * All details to be passed over, checking for all parameters at client side
 */
$app->put('/account', function() use ($app) {
            $Id=Auth($app);
            $user = new Account();
            Functions::verifyRequiredParams(array('name', 'email', 'password', 'contact_num', 'address'));
            $name = $app->request->put('name');
            $email = $app->request->put('email');
            $password = $app->request->put('password');
            $contact_num  = $app->request->put('contact_num');
            $address = $app->request->put('address');
            Functions::validateEmail($email);

            $user->updatedetails($Id,$name,$email,$password,$contact_num,$address);
            if ($result = true){
                $response ["error"] = false;
                $response["message"] = "User details updated!";
            }else{
                $response["error"] = True;
                $response["message"] = "Update Failed!";
            }
        Functions::echoRespnse(200, $response);
});
/**
 * Verify password
 */

$app->post('/account',function() use ($app){
    $Id = Auth($app);
    $user = new Account($Id);
    Functions::verifyRequiredParams(array('password'));
    $parsedpassword = $app->request('password');
    $password_hash['password_hash'] = $user->getpasshash();

    if (Functions::check_password($password_hash, $parsedpassword)){
        $response["message"] = "Password provided correct";
    }
    else{
        $response["message"] = "Password provided incorrect";
    }
    Functions::echoRespnse(200, $response);

});

//Auth function
function Auth($app){
    $route = $app->router->getCurrentRoute();
    $Id=(Functions::authenticate($route));
    $Id = $Id['user_id'];
    return $Id;
}

$app->run();
  ?>