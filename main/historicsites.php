<?php
$title = "Historic Sites - SGexplore";
include "header.php";
?>



<?php
require './libs/Slim/Slim.php';
require 'Models/historicsites.php';
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
                        <h4>Historic Sites</h4>
                        <p>Explore Historic Sites of Singapore</p>
                    </div>
                </div>
            </div>
            <div class="row">';
	
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
				echo '<a href="historicsites.php/'.$row["id"].'"><div class="col-12 col-sm-6 col-lg-4">
						<div class="single-features-area mb-50">
							<img src="'.$row["PHOTOURL"].'" alt="">
							<div class="feature-content d-flex align-items-center justify-content-between">
								<div class="feature-title">
									<h5>'.$row["NAME"].'</h5>
									<p>'.$row["ADDRESSSTREETNAME"].'</p>
								</div>
								<div class="feature-favourite">
									<a href="historicsites.php/id:'.$row["id"].'"><i class="fa fa-plus-o" aria-hidden="true"></i></a>
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
    
	$historicsites = new historicsites();
    $result = $historicsites->singlefetch($id);
    if ($result != NULL) {
        $response["error"] = false;
        $count = $result->num_rows;
        if ($count == 0){

        }
        else{
            while ($row= $result->fetch_assoc()) {
                $cookie_name = "planner";
if(isset($_POST["add_to_planner"]))
{
    if(isset($_COOKIE[$cookie_name])) {
        $cookie_data = stripslashes($_COOKIE[$cookie_name]);
        $itinerary_data = json_encode($cookie_data, true);
    } 
    else
    {
        $planner_data = array();
    }

    $planner_array = array(
        'name' => $_POST["hidden_name"],
        'address' => $_POST["hidden_address"],
        'date' => $_POST["date"],
        'time' => $_POST["time"]
    );

    $planner_data[] = $planner_array;
    $itinerary_data = json_encode($planner_data);
    setcookie($cookie_name, $itinerary_data, time() + (86400 * 30));
}
	echo '<div class="breadcumb-area height-600 bg-img bg-overlay" style="background-image: url('.$row["PHOTOURL"].')">
	<div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <div class="map-ratings-review-area d-flex">
                            <a href="../historicsites.php">Historic Sites</a>
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
                            <form method="post" action="../planner.php">
                            
                                <input type="hidden" name="hidden_name" value='.$row["NAME"].'/>
                                
                                <input type="hidden" name="hidden_address" value='.$row["ADDRESSSTREETNAME"].'/>
                                
                                <select class="custom-select" id="date" name="date">
                                    <option selected value="30th March">30th March</option>
                                    <option value="1st March">1 March</option>
                                    <option value="2nd March">2 March</option>
                                    <option value="3rd March">3 March</option>
                                    <option value="4th March">4 March</option>
                                    <option value="5th March">5 March</option>
                                </select>
                                <select class="custom-select" id="time" name="time">
                                    <option selected value="8:00AM">8:00 AM</option>
                                    <option value="9:00 AM">9:00 AM</option>
                                    <option value="10:00 AM">10:00 AM</option>
                                    <option value="11:00 AM">11:00 AM</option>
                                </select>
                                <button type="submit" value="submit" class="btn dorne-btn bg-white text-dark" name="add_to_planner"><i class="fa fa-check pr-2" aria-hidden="true"></i> Add To Itinerary</button>
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

<div class="book-a-table-widget mt-50">
                            <h6>Add To Itinerary</h6>
                            <form method="post" action="planner.php">
                            
                                <input type="hidden" name="hidden_name" value="Test"/>
                                
                                <input type="hidden" name="hidden_address" value="test"/>
                                
                                <select class="custom-select" id="date" name="date">
                                    <option selected value="30th March">30th March</option>
                                    <option value="1st March">1 March</option>
                                    <option value="2nd March">2 March</option>
                                    <option value="3rd March">3 March</option>
                                    <option value="4th March">4 March</option>
                                    <option value="5th March">5 March</option>
                                </select>
                                <select class="custom-select" id="time" name="time">
                                    <option selected value="8:00AM">8:00 AM</option>
                                    <option value="9:00 AM">9:00 AM</option>
                                    <option value="10:00 AM">10:00 AM</option>
                                    <option value="11:00 AM">11:00 AM</option>
                                </select>
                                <button type="submit" value="submit" class="btn dorne-btn bg-white text-dark" name="add_to_planner"><i class="fa fa-check pr-2" aria-hidden="true"></i> Add To Itinerary</button>
                            </form>
                        </div>


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