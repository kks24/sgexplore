<?php
require '.././libs/Slim/Slim.php';
require '../Models/Annoucments.php';
require '../include/Functions.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->get('/loadannoucments', function() use ($app) {
    $annoucment = new Annoucments();
    $result = $annoucment->fetchdescription();
    if ($result != NULL) {
        $response["error"] = false;
        $count = $result->num_rows;
        if ($count == 0){
        $response["Null"] = true;
	    $response["message"] = "No Annoucments";
        }
        else{
            $response["Null"] = false;
            $response["message"] = "Current Annoucments";
            $response["annoucments"] = array();
            // looping through result and preparing tasks array
            while ($row= $result->fetch_assoc()) {
                $tmp = array();
                $tmp["annoucmentId"] = $row["annoucement_id"];
                $tmp["annoucmenttype"] = $row["announcement_typeid"];
                $tmp["title"] = $row["title"];
                array_push($response["annoucments"], $tmp);
            }
        }
    }
    else{
        $response["error"] = true;
        $response["message"] = "Error connecting to Database";
    }
    Functions::echoRespnse(200, $response);});


$app->get('/loadannoucments/:id', function($request)  {
    $annoucment = new Annoucments();
    $result = $annoucment->singlefetch( $request );
    if ($result != NULL) {
        $response["error"] = false;
        $count = $result->num_rows;
        if ($count == 0){
            $response["Null"] = true;
            $response["message"] = "No Annoucments";
        }
        else{
            $response["Null"] = false;
            $response["message"] = "Current Annoucments";
            $response["annoucments"] = array();
            // looping through result and preparing tasks array
            while ($row= $result->fetch_assoc()) {
                $tmp = array();
                $tmp["annoucmentId"] = $row["annoucement_id"];
                $tmp["annoucmenttype"] = $row["announcement_typeid"];
                $tmp["title"] = $row["title"];
                $tmp["content"] = $row["description"];
                array_push($response["annoucments"], $tmp);
            }
        }
    }
    else{
        $response["error"] = true;
        $response["message"] = "Error connecting to Database";
    }
    Functions::echoRespnse(200, $response);});


$app->run();
?>