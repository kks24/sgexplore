<?php
$title = "Hawker Centres - SGexplore";

$expiry = time() + (86400 * 30);
if (!isset($_COOKIE['planner']) )
    setcookie('planner', '', $expiry, "/");

if(isset($_POST["add_to_planner"]))
{
    if(isset($_COOKIE['planner'])) {
        $cookie_data = stripslashes($_COOKIE['planner']);
        $itinerary_data = json_decode($cookie_data, true);
        
    } 
    else
    {
        $itinerary_data = array();
    }

    $planner_array = array(
		'id' => $_POST["hidden_id"],
        'name' => $_POST["hidden_name"],
        'address' => $_POST["hidden_address"],
        'date' => $_POST["date"],
        'time' => $_POST["time"]
    );

    $itinerary_data[] = $planner_array;
    $data = json_encode($itinerary_data);
    setcookie('planner', $data, $expiry, "/");
	$message = "Successfully added Itinerary";
    echo "<script type='text/javascript'>alert('$message');</script>";
}

include "header.php";
?>

<?php
require './libs/Slim/Slim.php';
require 'Models/hawkercentres.php';
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
                        <h4>Hawker Centres</h4>
                        <p>Explore Hawker Centres of Singapore</p>
                    </div>
                </div>
            </div>
            <div class="row">';
	
    $hawkercentres = new hawkercentres();
    $result = $hawkercentres->fetchall();
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
				echo '<a href="hawkercentres.php/'.$row["id"].'"><div class="col-12 col-sm-6 col-lg-4">
						<div class="single-features-area mb-50">
							<img src="'.$row["PHOTOURL"].'" alt="">
							<div class="feature-content d-flex align-items-center justify-content-between">
								<div class="feature-title">
									<h5>'.$row["NAME"].'</h5>
									<p>'.$row["ADDRESSSTREETNAME"].'</p>
									<p>Region: '.$row["REGION"].'</p>
								</div>
								<div class="feature-favourite">
									<a href="hawkercentres.php/'.$row["id"].'"><i class="fa fa-plus-o" aria-hidden="true"></i></a>
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

$app->post('/',function() use ($app){
    echo '<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/mbs.jpg)"></div>
	<section class="dorne-listing-destinations-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark text-center">
                        <span></span>
                        <h4>Hawker Centres</h4>
                        <p>Explore Hawker Centres of Singapore</p>
                    </div>
                </div>
            </div>
            <div class="row">';
    $request = $app->request();
    $distance = $request->post('long_lat_distance');
    $lat = $request->post('lat');
    $long = $request->post('long');
    
    $latr=substr($lat, 0, -1);
    $longr = substr($long,0,-1);
    

        
	$hawkercentres = new hawkercentres();
    $result = $hawkercentres->distance($long,$lat,$distance);
     if ($result != NULL) {
        $response["error"] = false;
        $count = $result->num_rows;
        if ($count == 0){
            echo "<a href=\"javascript:history.go(-1)\">No items found :(</a>";
        }
         else{
             while ($row= $result->fetch_assoc()) {
                if ($row["distance"] != 0){
                        $newlat = $row["lat"];
                        $newlong = $row["lng"];
                        $redirecturl = "https://www.google.com/maps/dir/?api=1&origin=$latr,$longr&destination=$newlat,$newlong";
                    echo '<a href="hawkercentres.php/'.$row["id"].'"><div class="col-12 col-sm-6 col-lg-4">
                            <div class="single-features-area mb-50">
							<img src="'.$row["PHOTOURL"].'" alt="">
							<div class="feature-content d-flex align-items-center justify-content-between">
								<div class="feature-title">
									<h5>'.$row["NAME"].'</h5>
									<p>'.$row["ADDRESSSTREETNAME"].'</p>
                                    <h4>Distance away</h4>
                                    <p>'.round($row["distance"],2).' KM </p>
                                    <a href='.$redirecturl.' target="_blank">Directions</a>
								</div>
								<div class="feature-favourite">
									<a href="hawkercentres.php/'.$row["id"].'"><i class="fa fa-plus-o" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</div></a>';
            }}
             
         }}


    
});


$app->get('/:id', function($id) use ($app) {
	$hawkercentres = new hawkercentres();
    $result = $hawkercentres->singlefetch($id);
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
                            <a href="../hawkercentres.php">Hawker Centres</a>
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
                            <h6>'.$row["ADDRESS_MYENV"].'</h6>
                        </div>
				
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
            
						<div class="location-on-map mt-50" id="lomap">
                            <div class="location-map">
                               <div id="locationMap"></div>
                            </div>
                        </div>

                        <div class="overview-content mt-50" id="overview">
						<h4>Brief Description</h4>
                            <p>'.$row["DESCRIPTION_MYENV"].'</p>
							<p>Number of Food Stalls: '.$row["NO_OF_FOOD_STALLS"].'<br />
							Number of Market Stalls: '.$row["NO_OF_MARKET_STALLS"].'<br />
							Region: '.$row["REGION"].'</p>
                        </div>
						<!-- Opening Hours Widget -->
                        <div class="opening-hours-widget mt-50">
                            <h6>Opening Hours</h6>
                            <ul class="opening-hours">
                                <li>
                                    <p>Monday</p>
                                    <p>9 AM - 9 PM</p>
                                </li>
                                <li>
                                    <p>Tuesday</p>
                                    <p>9 AM - 9 PM</p>
                                </li>
                                <li>
                                    <p>Wednesday</p>
                                    <p>9 AM - 9 PM</p>
                                </li>
                                <li>
                                    <p>Thursday</p>
                                    <p>9 AM - 9 PM</p>
                                </li>
                                <li>
                                    <p>Friday</p>
                                    <p>9 AM - 9 PM</p>
                                </li>
                                <li>
                                    <p>Saturday</p>
                                    <p>9 AM - 9 PM</p>
                                </li>
                                <li>
                                    <p>Sunday</p>
                                    <p>9 AM - 9 PM</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Listing Sidebar -->
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="listing-sidebar">';
						date_default_timezone_set('Asia/Singapore');
						if(isset($_POST["date"])){
							$selected = $_POST["time"];
							//echo $selected;
							$request_date = strtotime($_POST["date"]);
							$request_time = strtotime($_POST["time"]);
							$formatted_date = date('Y-m-d',$request_date);
							$formatted_time = date('H:i:s',$request_time);
							$date = $formatted_date.'T'.$formatted_time.'Z';
							$day = date('d/m/Y',$request_date).' '.date('h:i A',$request_time);
							//echo $date;
						}
						else{
							$selected = "8:00 AM";
							$formatted_date = date('Y-m-d');
							$date = date("Y-m-d").'T'.date("H:i:s").'Z';
							$day = "Today ".date("h:i A");
						}
						$lat = $row["lat"];
						$lng = $row["lng"];
						include "include/weather_widget.php";

                        echo'<!-- Book A Table Widget -->
                        <div class="book-a-table-widget mt-50">
                            <h6>Add To Itinerary:<br />Plan Up to 7 Days Ahead</h6>
                            <form method="post" action="" id="cweather">
                                
                                <input type="hidden" name="hidden_name" value="'.$row["NAME"].'"/>
                                
                                <input type="hidden" name="hidden_address" value="'.$row["ADDRESSSTREETNAME"].'"/>
                                
                                <input type="hidden" name="hidden_id" value="'.$row["id"].'"/>
								
                                <input type ="date" id="date" name="date" onchange="checkDate()" class="form-control" value="'; echo $formatted_date; echo'">
								<br />
                                <select class="custom-select" id="time" name="time" onchange="checkweather()">
                                    <option ';if($selected == '8:00 AM'){echo("selected");} echo' value="8:00AM">8:00 AM</option>
                                    <option ';if($selected == '9:00 AM'){echo("selected");} echo' value="9:00 AM">9:00 AM</option>
                                    <option ';if($selected == '10:00 AM'){echo("selected");} echo' value="10:00 AM">10:00 AM</option>
                                    <option ';if($selected == '11:00 AM'){echo("selected");} echo' value="11:00 AM">11:00 AM</option>
									<option ';if($selected == '12:00 PM'){echo("selected");} echo' value="12:00 PM">12:00 PM</option>
									<option ';if($selected == '1:00 PM'){echo("selected");} echo' value="1:00 PM">1:00 PM</option>
									<option ';if($selected == '2:00 PM'){echo("selected");} echo' value="2:00 PM">2:00 PM</option>
									<option ';if($selected == '3:00 PM'){echo("selected");} echo' value="3:00 PM">3:00 PM</option>
									<option ';if($selected == '4:00 PM'){echo("selected");} echo' value="4:00 PM">4:00 PM</option>
									<option ';if($selected == '5:00 PM'){echo("selected");} echo' value="5:00 PM">5:00 PM</option>
									<option ';if($selected == '6:00 PM'){echo("selected");} echo' value="6:00 PM">6:00 PM</option>
									<option ';if($selected == '7:00 PM'){echo("selected");} echo' value="7:00 PM">7:00 PM</option>
									<option ';if($selected == '8:00 PM'){echo("selected");} echo' value="8:00 PM">8:00 PM</option>
									<option ';if($selected == '9:00 PM'){echo("selected");} echo' value="9:00 PM">9:00 PM</option>
									<option ';if($selected == '10:00 PM'){echo("selected");} echo' value="10:00 PM">10:00 PM</option>
									<option ';if($selected == '11:00 PM'){echo("selected");} echo' value="11:00 PM">11:00 PM</option>
                                </select>
                                <button type="submit" value="submit" id="addtoi" class="btn dorne-btn bg-white text-dark" name="add_to_planner"><i class="fa fa-check pr-2" aria-hidden="true"></i> Add To Itinerary</button>
                            </form>
                        </div>
                        
                        <!-- distance widget -->
                        <div class="book-a-table-widget mt-50">
                        <h6>Find sites close to this location</h6>
                        <form name = "distance" method="post" form id="distance">
                        <select class="custom-select" id="long_lat_type" name="long_lat_type">
                            <option selected value="Hawker Centres"> Hawker Centers</option>
                            <option value="Tourist sites">Tourism Sites</option>
                            <option value="Museums">Museums</option>
                            <option value="Monuments">Monuments</option>
                            <option value="Historic Sites">Historic Sites</option>
                        </select>
                        <h6>Maximum radius from current location</h6>
                        <select class="custom-select" id="long_lat_distance" name="long_lat_distance">
                            <option selected value="1"> 1 Kilometer </option>
                            <option value="2">2 Kilometer </option>
                            <option value="3">3 Kilometer</option>
                            <option value="4">4 Kilometer</option>
                            <option value="5">5 Kilometer</option>
                            <option value="6">6 Kilometer</option>
                            <option value="7">7 Kilometer</option>
                            <option value="8">8 Kilometer</option>
                            <option value="9">9 Kilometer</option>
                            <option value="10">10 Kilometer</option>
                        </select>
                        <input type="hidden" name="lat" value='.$row["lat"].'/>
                        <input type="hidden" name="long" value='.$row["lng"].'/>
                        
                        <button type="submit" onclick="distanceselection()" class="btn dorne-btn bg-white text-dark" name="distance_search"><i class="fa fa-check pr-2" aria-hidden="true"></i> Search</button>
                        </form>
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
	  function checkDate() {
		var GivenDate = document.getElementById(\'date\').value;
		var CurrentDate = new Date();
		var CurrentFormattedDate = new Date(CurrentDate.getFullYear(), CurrentDate.getMonth(), CurrentDate.getDate());
		var CurrentDateAdd7 = new Date(CurrentDate.getFullYear(), CurrentDate.getMonth(), CurrentDate.getDate()+7);
		GivenDate = new Date(GivenDate);

		if(GivenDate >= CurrentFormattedDate && GivenDate <= CurrentDateAdd7){
			document.getElementById(\'addtoi\').disabled = false;
		}
		else if (GivenDate > CurrentDateAdd7){
			alert(\'You cannot select more than 7 days ahead. Please Select Again.\');
			document.getElementById(\'addtoi\').disabled = true;
		}
		else{
			alert(\'Incorrect Date Input. Please Select Again.\');
			document.getElementById(\'addtoi\').disabled = true;
		}
	  }

	  function checkweather() {
		var GivenDate = document.getElementById(\'date\').value;
		var CurrentDate = new Date();
		var CurrentFormattedDate = new Date(CurrentDate.getFullYear(), CurrentDate.getMonth(), CurrentDate.getDate());
		var CurrentDateAdd7 = new Date(CurrentDate.getFullYear(), CurrentDate.getMonth(), CurrentDate.getDate()+7);
		GivenDate = new Date(GivenDate);
		
		if(GivenDate >= CurrentFormattedDate && GivenDate <= CurrentDateAdd7){
			document.getElementById(\'addtoi\').disabled = false;
			document.getElementById("cweather").submit();
		}
		else if (GivenDate > CurrentDateAdd7){
			alert(\'You cannot select more than 7 days ahead. Please Select Again.\');
			document.getElementById(\'addtoi\').disabled = true;
		}
		else{
			alert(\'Incorrect Date Input. Please Select Again.\');
			document.getElementById(\'addtoi\').disabled = true;
			
		}
	  }
      
      function distanceselection() {
      var place = document.getElementById(\'long_lat_type\');
      var value = place.options[place.selectedIndex].value;
      if (value == "Museums" ){
           document.getElementById("distance").action = "https://sgexplore.tk/main/museums.php"
           document.getElementById("distance").submit();
           }
     if (value == "Hawker Centres" ){
           document.getElementById("distance").action = "https://sgexplore.tk/main/hawkercentres.php"
           document.getElementById("distance").submit();
            }   
     if (value == "Tourist sites" ){
           document.getElementById("distance").action = "https://sgexplore.tk/main/tourismplace.php"
            document.getElementById("distance").submit();
}
     if (value == "Monuments" ){
           document.getElementById("distance").action = "https://sgexplore.tk/main/monuments.php"
           document.getElementById("distance").submit();}
    if (value == "Historic Sites" ){
            document.getElementById("distance").action = "https://sgexplore.tk/main/historicsites.php" 
            document.getElementById("distance").submit();}
      }
</script>';
            }
        }
    }
    else{

    }
});

$app->post('/:id', function($id) use ($app) {
	$hawkercentres = new hawkercentres();
    $result = $hawkercentres->singlefetch($id);
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
                            <a href="../hawkercentres.php">Hawker Centres</a>
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
                            <h6>'.$row["ADDRESS_MYENV"].'</h6>
                        </div>
				
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
            
			<div class="location-on-map mt-50" id="lomap">
                            <div class="location-map">
                               <div id="locationMap"></div>
                            </div>
                        </div>

                        <div class="overview-content mt-50" id="overview">
						<h4>Brief Description</h4>
                            <p>'.$row["DESCRIPTION_MYENV"].'</p>
							<p>Number of Food Stalls: '.$row["NO_OF_FOOD_STALLS"].'<br />
							Number of Market Stalls: '.$row["NO_OF_MARKET_STALLS"].'<br />
							Region: '.$row["REGION"].'</p>
                        </div>
						
						<!-- Opening Hours Widget -->
                        <div class="opening-hours-widget mt-50">
                            <h6>Opening Hours</h6>
                            <ul class="opening-hours">
                                <li>
                                    <p>Monday</p>
                                    <p>9 AM - 9 PM</p>
                                </li>
                                <li>
                                    <p>Tuesday</p>
                                    <p>9 AM - 9 PM</p>
                                </li>
                                <li>
                                    <p>Wednesday</p>
                                    <p>9 AM - 9 PM</p>
                                </li>
                                <li>
                                    <p>Thursday</p>
                                    <p>9 AM - 9 PM</p>
                                </li>
                                <li>
                                    <p>Friday</p>
                                    <p>9 AM - 9 PM</p>
                                </li>
                                <li>
                                    <p>Saturday</p>
                                    <p>9 AM - 9 PM</p>
                                </li>
                                <li>
                                    <p>Sunday</p>
                                    <p>9 AM - 9 PM</p>
                                </li>
                            </ul>
                        </div>
					</div>
                </div>

                <!-- Listing Sidebar -->
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="listing-sidebar">';
						date_default_timezone_set('Asia/Singapore');
						if(isset($_POST["date"])){
							$selected = $_POST["time"];
							//echo $selected;
							$request_date = strtotime($_POST["date"]);
							$request_time = strtotime($_POST["time"]);
							$formatted_date = date('Y-m-d',$request_date);
							$formatted_time = date('H:i:s',$request_time);
							$date = $formatted_date.'T'.$formatted_time.'Z';
							$day = date('d/m/Y',$request_date).' '.date('h:i A',$request_time);
							//echo $date;
						}
						else{
							$selected = "8:00 AM";
							$formatted_date = date('Y-m-d');
							$date = date("Y-m-d").'T'.date("H:i:s").'Z';
							$day = "Today ".date("h:i A");
						}
						$lat = $row["lat"];
						$lng = $row["lng"];
						include "include/weather_widget.php";

                        echo'<!-- Book A Table Widget -->
                        <div class="book-a-table-widget mt-50">
                            <h6>Add To Itinerary:<br />Plan Up to 7 Days Ahead</h6>
                            <form method="post" action="" id="cweather">
                                
                                <input type="hidden" name="hidden_name" value="'.$row["NAME"].'"/>
                                
                                <input type="hidden" name="hidden_address" value="'.$row["ADDRESSSTREETNAME"].'"/>
                                
                                <input type="hidden" name="hidden_id" value="'.$row["id"].'"/>
								
                                <input type ="date" id="date" name="date" onchange="checkDate()" class="form-control" value="'; echo $formatted_date; echo'">
								<br />
                                <select class="custom-select" id="time" name="time" onchange="checkweather()">
                                    <option ';if($selected == '8:00 AM'){echo("selected");} echo' value="8:00AM">8:00 AM</option>
                                    <option ';if($selected == '9:00 AM'){echo("selected");} echo' value="9:00 AM">9:00 AM</option>
                                    <option ';if($selected == '10:00 AM'){echo("selected");} echo' value="10:00 AM">10:00 AM</option>
                                    <option ';if($selected == '11:00 AM'){echo("selected");} echo' value="11:00 AM">11:00 AM</option>
									<option ';if($selected == '12:00 PM'){echo("selected");} echo' value="12:00 PM">12:00 PM</option>
									<option ';if($selected == '1:00 PM'){echo("selected");} echo' value="1:00 PM">1:00 PM</option>
									<option ';if($selected == '2:00 PM'){echo("selected");} echo' value="2:00 PM">2:00 PM</option>
									<option ';if($selected == '3:00 PM'){echo("selected");} echo' value="3:00 PM">3:00 PM</option>
									<option ';if($selected == '4:00 PM'){echo("selected");} echo' value="4:00 PM">4:00 PM</option>
									<option ';if($selected == '5:00 PM'){echo("selected");} echo' value="5:00 PM">5:00 PM</option>
									<option ';if($selected == '6:00 PM'){echo("selected");} echo' value="6:00 PM">6:00 PM</option>
									<option ';if($selected == '7:00 PM'){echo("selected");} echo' value="7:00 PM">7:00 PM</option>
									<option ';if($selected == '8:00 PM'){echo("selected");} echo' value="8:00 PM">8:00 PM</option>
									<option ';if($selected == '9:00 PM'){echo("selected");} echo' value="9:00 PM">9:00 PM</option>
									<option ';if($selected == '10:00 PM'){echo("selected");} echo' value="10:00 PM">10:00 PM</option>
									<option ';if($selected == '11:00 PM'){echo("selected");} echo' value="11:00 PM">11:00 PM</option>
                                </select>
                                <button type="submit" value="submit" id="addtoi" class="btn dorne-btn bg-white text-dark" name="add_to_planner"><i class="fa fa-check pr-2" aria-hidden="true"></i> Add To Itinerary</button>
                            </form>
                        </div>
                        
                        <!-- distance widget -->
                        <div class="book-a-table-widget mt-50">
                        <h6>Find sites close to this location</h6>
                        <form name = "distance" method="post" form id="distance">
                        <select class="custom-select" id="long_lat_type" name="long_lat_type">
                            <option selected value="Hawker Centres"> Hawker Centers</option>
                            <option value="Tourist sites">Tourism Sites</option>
                            <option value="Museums">Museums</option>
                            <option value="Monuments">Monuments</option>
                            <option value="Historic Sites">Historic Sites</option>
                        </select>
                        <h6>Maximum radius from current location</h6>
                        <select class="custom-select" id="long_lat_distance" name="long_lat_distance">
                            <option selected value="1"> 1 Kilometer </option>
                            <option value="2">2 Kilometer </option>
                            <option value="3">3 Kilometer</option>
                            <option value="4">4 Kilometer</option>
                            <option value="5">5 Kilometer</option>
                            <option value="6">6 Kilometer</option>
                            <option value="7">7 Kilometer</option>
                            <option value="8">8 Kilometer</option>
                            <option value="9">9 Kilometer</option>
                            <option value="10">10 Kilometer</option>
                        </select>
                        <input type="hidden" name="lat" value='.$row["lat"].'/>
                        <input type="hidden" name="long" value='.$row["lng"].'/>
                        
                        <button type="submit" onclick="distanceselection()" class="btn dorne-btn bg-white text-dark" name="distance_search"><i class="fa fa-check pr-2" aria-hidden="true"></i> Search</button>
                        </form>
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
	  function checkDate() {
		var GivenDate = document.getElementById(\'date\').value;
		var CurrentDate = new Date();
		var CurrentFormattedDate = new Date(CurrentDate.getFullYear(), CurrentDate.getMonth(), CurrentDate.getDate());
		var CurrentDateAdd7 = new Date(CurrentDate.getFullYear(), CurrentDate.getMonth(), CurrentDate.getDate()+7);
		GivenDate = new Date(GivenDate);

		if(GivenDate >= CurrentFormattedDate && GivenDate <= CurrentDateAdd7){
			document.getElementById(\'addtoi\').disabled = false;
		}
		else if (GivenDate > CurrentDateAdd7){
			alert(\'You cannot select more than 7 days ahead. Please Select Again.\');
			document.getElementById(\'addtoi\').disabled = true;
		}
		else{
			alert(\'Incorrect Date Input. Please Select Again.\');
			document.getElementById(\'addtoi\').disabled = true;
		}
	  }

	  function checkweather() {
		var GivenDate = document.getElementById(\'date\').value;
		var CurrentDate = new Date();
		var CurrentFormattedDate = new Date(CurrentDate.getFullYear(), CurrentDate.getMonth(), CurrentDate.getDate());
		var CurrentDateAdd7 = new Date(CurrentDate.getFullYear(), CurrentDate.getMonth(), CurrentDate.getDate()+7);
		GivenDate = new Date(GivenDate);
		
		if(GivenDate >= CurrentFormattedDate && GivenDate <= CurrentDateAdd7){
			document.getElementById(\'addtoi\').disabled = false;
			document.getElementById("cweather").submit();
		}
		else if (GivenDate > CurrentDateAdd7){
			alert(\'You cannot select more than 7 days ahead. Please Select Again.\');
			document.getElementById(\'addtoi\').disabled = true;
		}
		else{
			alert(\'Incorrect Date Input. Please Select Again.\');
			document.getElementById(\'addtoi\').disabled = true;
			
		}
	  }
      
      function distanceselection() {
      var place = document.getElementById(\'long_lat_type\');
      var value = place.options[place.selectedIndex].value;
      if (value == "Museums" ){
           document.getElementById("distance").action = "https://sgexplore.tk/main/museums.php"
           document.getElementById("distance").submit();
           }
     if (value == "Hawker Centres" ){
           document.getElementById("distance").action = "https://sgexplore.tk/main/hawkercentres.php"
           document.getElementById("distance").submit();
            }   
     if (value == "Tourist sites" ){
           document.getElementById("distance").action = "https://sgexplore.tk/main/tourismplace.php"
            document.getElementById("distance").submit();
}
     if (value == "Monuments" ){
           document.getElementById("distance").action = "https://sgexplore.tk/main/monuments.php"
           document.getElementById("distance").submit();}
    if (value == "Historic Sites" ){
            document.getElementById("distance").action = "https://sgexplore.tk/main/historicsites.php" 
            document.getElementById("distance").submit();}
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