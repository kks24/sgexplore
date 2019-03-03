<?php
date_default_timezone_set('Asia/Singapore');

$date = date("Y-m-d").'T'.date("H:i:s").'Z';
//echo $date;

$weather_data = json_decode(file_get_contents('https://api.darksky.net/forecast/c481a49cd57eff4734843354139fa7b2/'.$lat.','.$lng.','.$date.'?exclude=hourly,daily,flags'), true);
//print_r($weather_data);

//echo $weather_data['currently']->$weather_data['temperature'];

foreach($weather_data['currently'] as $key => $value) {
    //echo $result['temperature'], '<br>';
	if($key == 'temperature') {
        $currenttemp = round($cen = ($value - 32) / 1.8, 1);
    }
}


?>

<div class="author-widget mt-50 d-flex align-items-center">
     <img src="https://img.icons8.com/ios/50/000000/sun-filled.png" alt="">
        <div class="authors-name">
           <a href="#">Weather Today</a>
             <p><?php echo $currenttemp; ?>&deg;C</p>
        </div>
</div>