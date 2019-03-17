<?php
$title = "Itinerary Planner - SGexplore";
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
include "header.php";
?>

<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/mbs.jpg)"></div>
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
        </div>
    </section>

<div class="cart">
        <table class="table">
            <tbody>
            <tr>
                <td>Date</td>
                <td>Itinerary</td>
                <td>Address</td>
                <td>Time</td>
            </tr>	
            <?php		
                if(isset($_COOKIE[$cookie_name]))
                {
                    $cookie_data = stripslashes($_COOKIE[$cookie_name]);
                    $planner_data = json_encode($cookie_data, true);
					print_r($planner_data);
                    foreach($planner_data as $values)
                    {
					echo'
                    <tr>
                        <td>'.$values["date"].'</td>
                        <td>'.$values["name"].'</td>
                        <td>'.$values["address"].'</td>
                        <td>'.$values["time"].'</td>
                    </tr>';
                    }
                }
            ?>
            
            </tbody>
        </table>
</div>
 
<div style="clear:both;"></div>

<?php
include "footer.php";
?>