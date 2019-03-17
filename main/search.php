<?php
$title = "Search Results - SGexplore";
include "header.php";
?>

<?php
require './libs/Slim/Slim.php';
require 'Models/searchmodel.php';
require 'include/Functions.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->post('/', function() use ($app) {
	//$currenticon = str_replace('-', ' ', $search);
	$searchwords = $app->request->post('search');
	echo '<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/mbs.jpg)"></div>
	<section class="dorne-listing-destinations-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark text-center">
                        <span></span>
                        <h4>Search Results For '.$searchwords.'</h4>
                    </div>
                </div>
            </div>
            <div class="row">';
	
    $searchmodel = new searchmodel();
    $result = $searchmodel->search_place($searchwords);
	//echo Sresult;
    if ($result != NULL) {
        $response["error"] = false;
        $count = $result->num_rows;
        if ($count == 0){
            echo'<h4>Not Found</h4>';
        }
        else{
            //$response["Null"] = false;
            //$response["message"] = "Current Rewards";
            //$response["rewards"] = array();
            // looping through result and preparing tasks array
            while ($row= $result->fetch_assoc()) {
				echo '<a href="'.$row["category"].'.php/'.$row["id"].'"><div class="col-12 col-sm-6 col-lg-4">
						<div class="single-features-area mb-50">';
						if($row["category"] == "tourismplace"){
							echo'<img src="http://'.$row["PHOTOURL"].'" alt="">';
						}
						else{
							echo'<img src="'.$row["PHOTOURL"].'" alt="">';
						}
						echo'
							<div class="feature-content d-flex align-items-center justify-content-between">
								<div class="feature-title">
									<h5>'.$row["NAME"].'</h5>
									<p>'.$row["ADDRESSSTREETNAME"].'</p>
								</div>
								<div class="feature-favourite">
									<a href="monuments.php/'.$row["id"].'"><i class="fa fa-plus-o" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</div></a>';
            }
        }
    }
    else{
		 echo'<h4>Not Found</h4>';
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
<?php
include "footer.php";
?>