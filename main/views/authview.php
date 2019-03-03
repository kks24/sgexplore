<?php


require '.././libs/Slim/Slim.php';
require '../Models/Account.php';
require '../include/Functions.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

/**
 * User Registration
 * url - /register
 * method - POST
 * params - name, email, password
 */
$app->post('/register', function() use ($app) {
            // check for required params
            $Login = new Account();
            Functions::verifyRequiredParams(array('name', 'email', 'password', 'contact_num', 'address'));

            $response = array();
            // reading post params
            $name = $app->request->post('name');
            $email = $app->request->post('email');
            $password = $app->request->post('password');
			$contact_num  = $app->request->post('contact_num');
			$address = $app->request->post('address');

            // validating email address
            Functions::validateEmail($email);
            $res = $Login->createUser($name, $email, $password, $contact_num, $address);
            if ($res == USER_CREATED_SUCCESSFULLY) {
                $response["error"] = false;
                $response["message"] = "You are successfully registered";
            } else if ($res == USER_CREATE_FAILED) {
                $response["error"] = true;
                $response["message"] = "Oops! An error occurred while registereing";
            } else if ($res == USER_ALREADY_EXISTED) {
                $response["error"] = true;
                $response["message"] = "Sorry, this email already existed";
            }
            // echo json response
    echorespnse(201, $response);
        });

/**
 * User Login
 * url - /login
 * method - POST
 * params - email, password
 */
$app->post('/login', function() use ($app) {
            // check for required params
            Functions::verifyRequiredParams(array('email', 'password'));
            // reading post params
            $email = $app->request()->post('email');
            $password = $app->request()->post('password');
            $response = array();
            $Login = new Account();
            // check for correct email and password
            if ($Login->checkLogin($email, $password)) {
                // get the user by email
                $user = $Login->getUserByEmail($email);

                if ($user != NULL) {
                    $response["error"] = false;
					$response['user_id'] = $user['user_id'];
                    $response['name'] = $user['full_name'];
                    $response['email'] = $user['email'];
					$response['contact_num'] = $user['contact_num'];
					$response['address'] = $user['address'];
					$response['points'] = $user['points'];
                    $response['apiKey'] = $user['api_key'];
                    $response['createdAt'] = $user['created_at'];
                } else {
                    // unknown error occurred
                    $response['error'] = true;
                    $response['message'] = "An error occurred. Please try again";
                }
            } else {
                // user credentials are wrong
                $response['error'] = true;
                $response['message'] = 'Login failed. Incorrect credentials';
            }

    echoRespnse(200, $response);
        });

function echoRespnse($status_code, $response) {
    $app = \Slim\Slim::getInstance();
    // Http response code
    $app->status($status_code);

    // setting response content type to json
    $app->contentType('application/json');

    echo json_encode($response);
}


$app->run();
  ?>