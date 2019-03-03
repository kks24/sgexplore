<html>
<section class="dorne-listing-destinations-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark text-center">
                        <span></span>
                        <h4>Featured destinations</h4>
                        <p>Editor’s pick</p>
                    </div>
                </div>
            </div>
            <div class="row">
<?php
require '.././libs/Slim/Slim.php';
require '../Models/Historicsites.php';
require '../include/Functions.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->get('/all', function() use ($app) {
    $historicsites = new historicsites();
    $result = $historicsites->fetchall();
    if ($result != NULL) {
        $response["error"] = false;
        $count = $result->num_rows;
        if ($count == 0){
            //$response["Null"] = true;
            //$response["message"] = "No rewards";
        }
        else{
            //$response["Null"] = false;
            //$response["message"] = "Current Rewards";
            //$response["rewards"] = array();
            // looping through result and preparing tasks array
            while ($row= $result->fetch_assoc()) {
				echo '<div class="col-12 col-sm-6 col-lg-4">
						<div class="single-features-area mb-50">
							<img src="'.$row["PHOTOURL"].'" alt="">
							<!-- Price -->
							<div class="price-start">
								<p>'.$row["kml_name"].'</p>
							</div>
							<div class="feature-content d-flex align-items-center justify-content-between">
								<div class="feature-title">
									<h5>'.$row["NAME"].'</h5>
									<p>'.$row["ADDRESSSTREETNAME"].'</p>
								</div>
								<div class="feature-favourite">
									<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</div>';
            }
        }
    }
    else{
        //$response["error"] = true;
        //$response["message"] = "Error connecting to Database. Please Try Again.";
    }
    //Functions::echoRespnse(200, $response);
});

$app->run();

?>

            </div>
        </div>
    </section>
</html>