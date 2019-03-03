<?php
require '.././libs/Slim/Slim.php';
require '../Models/Feedback.php';
require '../include/Functions.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->get('/feedback', function() use ($app) {
    $Id = Auth($app);
    $feedback = new feedback();
    $result = $feedback->singlefetch($Id);
    $count = $result->num_rows;
    if ($result != NULL) {
        $response["error"] = false;
        if ($count == 0){
            $response["Null"] = true;
            $response["message"] = "No Feedback";
        }
        else{
            $response["Null"] = false;
        $response["message"] = "User Feedback";
        $response["Feedback"] = array();
        // looping through result and preparing tasks array
        while ($row = $result->fetch_assoc()) {
            $tmp = array();
            $tmp["content"] = $row["content"];
            $tmp["type"] = $row["type"];
            $tmp["date"] = $row["datesubmitted"];
            array_push($response["Feedback"], $tmp);
        }

    }}
    else{
        $response["error"] = true;
        $response["message"] = "Error connecting to Database";
    }
    Functions::echoRespnse(200, $response);});


$app->post('/feedback', function() use ($app) {
    $Id = Auth($app);
    $feedback = new feedback();
    Functions::verifyRequiredParams(array('content', 'type'));

    $content = $app->request()->post('content');
    $type = $app->request()->post('type');

    $result = $feedback->insert($Id,$content,$type);
    if ($result != NULL && $result == true) {
        $response["error"] = false;
        $response["message"] = "Submitted Feedback";}
    else{
        $response["error"] = true;
        $response["message"] = "Error submitting feedback";
    }
    Functions::echoRespnse(200, $response);});



function Auth($app){
    $route = $app->router()->getCurrentRoute();
    $Id=(Functions::authenticate($route));
    $Id = $Id['user_id'];
    return $Id;
}

$app->run();
?>