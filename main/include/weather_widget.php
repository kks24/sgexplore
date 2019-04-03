<?php

$weather_data = json_decode(file_get_contents('https://api.darksky.net/forecast/c481a49cd57eff4734843354139fa7b2/'.$lat.','.$lng.','.$date.'?exclude=hourly,daily,flags'), true);
//print_r($weather_data);

//echo $weather_data['currently']->$weather_data['temperature'];

foreach($weather_data['currently'] as $key => $value) {
    //echo $result['temperature'], '<br>';
	if($key == 'temperature') {
        $currenttemp = round($cen = ($value - 32) / 1.8, 1);
    }
	if($key == 'summary') {
        $currentsum = $value;
    }
	if($key == 'icon') {
		$currenticon = str_replace('-', '_', $value);
    }
}


?>

<div class="author-widget mt-50 d-flex align-items-center">
	 <canvas id="weathericon" width="50" height="50"></canvas>
        <div class="authors-name">
           <h6>Weather For <?php echo $day; ?><br />
		     <?php echo $currentsum; ?><br />
             <h6><?php echo $currenttemp; ?>&deg;C</h6>
        </div>
</div>
<script src="../js/skycons.js"></script>

<script>
  var skycons = new Skycons({"color": "black"});
  // on Android, a nasty hack is needed: {"resizeClear": true}

  // you can add a canvas by it's ID...
  skycons.add("weathericon", Skycons.<?php echo strtoupper($currenticon); ?>);

  // ...or by the canvas DOM element itself.
  //skycons.add(document.getElementById("icon2"), Skycons.RAIN);

  // if you're using the Forecast API, you can also supply
  // strings: "partly-cloudy-day" or "rain".

  // start animation!
  skycons.play();

  // you can also halt animation with skycons.pause()

  // want to change the icon? no problem:
  //skycons.set("icon1", Skycons.PARTLY_CLOUDY_NIGHT);

  // want to remove one altogether? no problem:
  //skycons.remove("icon2");
</script>