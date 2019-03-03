<?php
$title = "Monuments - SGexplore";
include "header.php";
?>

<?php
require './libs/Slim/Slim.php';
require 'Models/monuments.php';
require 'include/Functions.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->get('/', function() use ($app) {
	echo '<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/mbs.jpg)"></div>
	<section class="dorne-listing-destinations-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark text-center">
                        <span></span>
                        <h4>Monuments</h4>
                        <p>Explore Monuments of Singapore</p>
                    </div>
                </div>
            </div>
            <div class="row">';
	
    $monuments = new monuments();
    $result = $monuments->fetchall();
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
				echo '<a href="monuments.php/'.$row["id"].'"><div class="col-12 col-sm-6 col-lg-4">
						<div class="single-features-area mb-50">
							<img src="'.$row["PHOTOURL"].'" alt="">
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
        //$response["error"] = true;
        //$response["message"] = "Error connecting to Database. Please Try Again.";
    }
    //Functions::echoRespnse(200, $response);
});


$app->get('/:id', function($id) use ($app) {
	$monuments = new monuments();
    $result = $monuments->singlefetch($id);
    if ($result != NULL) {
        $response["error"] = false;
        $count = $result->num_rows;
        if ($count == 0){

        }
        else{
            while ($row= $result->fetch_assoc()) {
	echo '<div class="breadcumb-area height-600 bg-img bg-overlay" style="background-image: url('.$row["PHOTOURL"].')">
	<div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <div class="map-ratings-review-area d-flex">
                            <a href="../monuments.php">Monuments</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Single Listing Area Start ***** -->
    <section class="dorne-single-listing-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Listing Content -->
                <div class="col-12 col-lg-8">
                    <div class="single-listing-content">

                        <div class="listing-title">
                            <h4>'.$row["NAME"].'</h4>
                            <h6>'.$row["ADDRESSBLOCKHOUSENUMBER"].' '.$row["ADDRESSSTREETNAME"].', Singapore '.$row["ADDRESSPOSTALCODE"].'</h6>
                        </div>
						
						<div class="location-on-map mt-50" id="lomap">
                            <div class="location-map">
                               <div id="locationMap"></div>
                            </div>
                        </div>

                        <div class="overview-content mt-50" id="overview">
						<h4>Brief Description</h4>
                            <p>'.$row["DESCRIPTION"].'</p>
							<p>For more info, visit:<br /><a href="'.$row["HYPERLINK"].'">'.$row["HYPERLINK"].'</a></p>
                        </div>
                    </div>
                </div>

                <!-- Listing Sidebar -->
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="listing-sidebar">';
						$lat = $row["lat"];
						$lng = $row["lng"];
						include "include/weather_widget.php";

                        echo'<!-- Book A Table Widget -->
                        <div class="book-a-table-widget mt-50">
                            <h6>Add To Itinerary</h6>
                            <form action="#" method="get">
                                <select class="custom-select" id="Which day do you plan to go?">
                                <option selected>Which day do you plan to go?</option>
                                <option value="1">New York</option>
                                <option value="2">Latvia</option>
                                <option value="3">Dhaka</option>
                                <option value="4">Melbourne</option>
                                <option value="5">London</option>
                            </select>
                                <select class="custom-select" id="What time?">
                                <option selected>8:00 AM</option>
                                <option value="1">9:00 AM</option>
                                <option value="3">10:00 AM</option>
                                <option value="3">11:00 AM</option>
                            </select>
                                <button type="submit" class="btn dorne-btn bg-white text-dark"><i class="fa fa-check pr-2" aria-hidden="true"></i> Add To Itinerary</button>
                            </form>
                        </div>

                        <!-- Opening Hours Widget -->
                        <div class="opening-hours-widget mt-50">
                            <h6>Opening Hours</h6>
                            <ul class="opening-hours">
                                <li>
                                    <p>Monday</p>
                                    <p>Closed</p>
                                </li>
                                <li>
                                    <p>Tuesday</p>
                                    <p>9 AM - 1 PM</p>
                                </li>
                                <li>
                                    <p>Wednesday</p>
                                    <p>9 AM - 1 PM</p>
                                </li>
                                <li>
                                    <p>Thursday</p>
                                    <p>9 AM - 1 PM</p>
                                </li>
                                <li>
                                    <p>Friday</p>
                                    <p>9 AM - 1 PM</p>
                                </li>
                                <li>
                                    <p>Saturday</p>
                                    <p>9 AM - 1 PM</p>
                                </li>
                                <li>
                                    <p>Sunday</p>
                                    <p>9 AM - 1 PM</p>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
	
	
	<script>
      function initMap() {
        var myLatLng = {lat: '.$row["lat"].', lng: '.$row["lng"].'};

        var map = new google.maps.Map(document.getElementById(\'locationMap\'), {
          zoom: 18,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: \'Hello World!\'
        });
      }
</script>';
            }
        }
    }
    else{

    }
});



$app->run();

?>

            </div>
        </div>
    </section>
    <!-- ***** Listing Destinations Area End ***** -->
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhOGF0r49o-AC0eRIO4XuH4ES94JOf7ew&callback=initMap">
    </script>
<?php
include "footer.php";
?>