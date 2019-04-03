<?php
$title = "Itinerary Planner - SGexplore";

$expiry = time() + (86400 * 30);
if (!isset($_COOKIE['planner']) )
    setcookie('planner', '', $expiry, "/");

function sortFunctionByDate( $a, $b ) {
    return strtotime($a["date"]) - strtotime($b["date"]);
}
function sortFunctionByTime( $a, $b ) {
    return strtotime($a["time"]) - strtotime($b["time"]);
}

if(isset($_POST["clearcookie"]))
 {
    setcookie('planner', '', time() - 3600, "/");
    header("location:planner.php");
 }

if(isset($_GET["action"]))
{
    if($_GET["action"] == "remove")
    {
        $cookie_data = stripslashes($_COOKIE['planner']);
        $itinerary_data = json_decode($cookie_data, true);
        foreach($itinerary_data as $key => $values)
        {
            if($itinerary_data[$key]["id"] == $_GET["id"])
            {
                unset($itinerary_data[$key]);
                $data = json_encode($itinerary_data);
                setcookie('planner', $data, $expiry, "/");
                header("location:planner.php");
            }
        }
    }
    
}

include "header.php";
?>

<body>
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/mbs.jpg)"></div>
	<section class="dorne-listing-destinations-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark text-center">
                        <span></span>
                        <h4>Itinerary Planner</h4>
                        <p>Plan an Adventure of a Lifetime</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="schedule" id="dvContainer">
    <form method="post" action="">
                    <table id="scheduleTable">
                        <thead style="display: none;">
                            <tr>
                                <th scope="col">DATE</th>
                                <th scope="col">TIME</th>
                                <th scope="col">ITINERARY</th>
                                <th scope="col">ADDRESS</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="col">DATE</th>
                                <th scope="col">TIME</th>
                                <th scope="col">ITINERARY</th>
                                <th scope="col">ADDRESS</th>
                                <th scope="col"></th>
                            </tr>
            <?php		
                if(isset($_COOKIE['planner']))
                {
                    $cookie_data = stripslashes($_COOKIE['planner']);
                    $itinerary_data = json_decode($cookie_data, true);
                    
                    $itinerary_data2 = array();
                    $itinerary_data3 = array();
                    
                    usort($itinerary_data, "sortFunctionByDate");
                    
                    if(sizeof($itinerary_data)==0){
						echo "Your itinerary list is empty.";
					}
					else if (sizeof($itinerary_data)>1){
						$dateCheck = $itinerary_data[0]["date"];
						for($i = 0; $i<=sizeof($itinerary_data)-1; $i++)
						{
							if(isset($itinerary_data[$i+1]["date"]))
							{
								if($dateCheck == $itinerary_data[$i+1]["date"])
								{
									$itinerary_data2[] = $itinerary_data[$i];
									usort($itinerary_data2, "sortFunctionByTime");
								}
								else
								{
									$itinerary_data2[] = $itinerary_data[$i];
									$dateCheck = $itinerary_data[$i+1]["date"];
									usort($itinerary_data2, "sortFunctionByTime");
									for($n = 0; $n<=sizeof($itinerary_data2)-1; $n++)
									{
										$itinerary_data3[] = $itinerary_data2[$n];
									}
									unset($itinerary_data2);
								}
							}
							else{
								if($dateCheck == $itinerary_data[$i-1]["date"])
								{
									$itinerary_data2[] = $itinerary_data[$i];
									usort($itinerary_data2, "sortFunctionByTime");
									for($n = 0; $n<=sizeof($itinerary_data2)-1; $n++)
									{
										$itinerary_data3[] = $itinerary_data2[$n];
									}
									unset($itinerary_data2);
								}
								else
								{
									$itinerary_data2[] = $itinerary_data[$i];
									usort($itinerary_data2, "sortFunctionByTime");
									for($n = 0; $n<=sizeof($itinerary_data2)-1; $n++)
									{
										$itinerary_data3[] = $itinerary_data2[$n];
									}
									unset($itinerary_data2);
								}
							}
						}
					}
					else{
						$itinerary_data3[] = $itinerary_data[0];
					}
					
                    
                    foreach($itinerary_data3 as $key => $values)
                    {
                        $origDate = $values["date"];
                        $newDate = date("d-M-Y", strtotime($origDate));
                        
            ?>
							
                                <tr>
                                    <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $values["id"]; ?>"/>
									<td scope="row"><?php echo $newDate ?></td>
									<td><?php echo $values["time"] ?></td>
                                    <td><?php echo $values["name"] ?></td>
									<td><?php echo $values["address"] ?></td>
									<td><a href="https://sgexplore.tk/main/planner.php?action=remove&id=<?php echo $values["id"]; ?>" class="link">Remove</a> </td>
								</tr>
            <?php
                    }
                    
                }
            ?>
                            </tbody>
        </table>
        <button type="submit" value="submit" name="clearcookie" class="outline white-purple">Clear All</button> <button class="outline white-purple" id="btnPrint" onclick="exportPDF()">Print As PDF</button>
    </form>
    <br>
    
    <br>
</div>
 
<div style="clear:both;"></div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="https://rawgit.com/MrRio/jsPDF/master/dist/jspdf.debug.js"></script>
<script src="https://rawgit.com/someatoms/jsPDF-AutoTable/master/dist/jspdf.plugin.autotable.js"></script>
    
<script type="text/javascript">
    function exportPDF() 
    {
        var doc = new jsPDF('p', 'pt', 'a4');

        var res = doc.autoTableHtmlToJson(document.getElementById("scheduleTable"));
        
        //doc.autoTable(res.columns, res.data, {margin: {top: 80}});

        //doc.autoTable(column, "", {margin: {top: 90}});
        
        var columns = [res.columns[0], res.columns[1], res.columns[2], res.columns[3]];
        var header = function(data) 
        {
            doc.setFontSize(24);
            doc.setTextColor(40);
            doc.setFontStyle('normal');
            //doc.addImage(headerImgData, 'JPEG', data.settings.margin.left, 20, 50, 50);
            doc.text("SGexplore Itinerary Schedule", data.settings.margin.left * 3.5, 50);
        };
        
        var footer = function(data) 
        {
            doc.setFontSize(10);
            doc.setTextColor(40);
            doc.setFontStyle('normal');
            doc.text('Copyright ©2019 SGexplore. All rights reserved ', data.settings.margin.left, doc.internal.pageSize.height - 40);
            doc.text("SGexplore@tourism.com", data.settings.margin.right * 11, doc.internal.pageSize.height - 40);
        };

        var options = 
        {
            beforePageContent: header,
            afterPageContent: footer,
            margin: 
            {
                top: 80
            },
            startY: doc.autoTableEndPosY() +100
        };

        doc.autoTable(columns, res.data, options);

        doc.save("schedule.pdf");

        /*
        doc.autoTable(res.columns, res.data, {
        startY: doc.autoTableEndPosY() + 50
        });
        doc.autoTable(res.columns, res.data, {
        startY: height,
        afterPageContent: function(data) {
          doc.setFontSize(20)
          doc.text("After page content", 50, height - data.settings.margin.bottom - 20);
        }
        });

        doc.save('Generated PDF.pdf');
        */
    }
</script>
    
</body>

<style>
button {
    cursor: pointer;
    outline: none;
    margin: 20px;
    float:right;
}
        
button.outline {
  position: relative;
  z-index: 3;
  background: transparent;
  color: #7643ea;
  font-size: 14px;
font-weight: bold;
  border-color: #7643ea;
  border-style: solid;
  border-width: 2px;
  border-radius: 6px;
  padding: 6px 26px;
  text-transform: uppercase;
  transition: all 0.2s linear;
}
button.outline:hover {
  color: white;
  background: #7643ea;
  border-color: white;
  transition: all 0.2s linear;
}
button.outline:active {
  border-radius: 22px;
}
    
.schedule {
    margin: auto;
    margin-top: -40px;
    height: auto;
    max-width: 1100px;
    width: 100%;
}

.link {
     background:none!important;
     color:inherit;
     border:none; 
     padding:0!important;
     font: inherit;
     /*border is optional*/
     border-bottom:1px solid #444; 
     cursor: pointer;
}
    
.link:hover{
     color: #0000FF;
}

table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
    font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
    
    .table {
        overflow: hidden;
        border-radius: 3px;
        -webkit-box-shadow: 0 1px 6px 0 rgba(0,0,0,.12), 0 1px 6px 0 rgba(0,0,0,.12);
           -moz-box-shadow: 0 1px 6px 0 rgba(0,0,0,.12), 0 1px 6px 0 rgba(0,0,0,.12);
                box-shadow: 0 1px 6px 0 rgba(0,0,0,.12), 0 1px 6px 0 rgba(0,0,0,.12);
    }

    .table > thead > tr > th {
        border-bottom-color: #EEEEEE;
    }

    .table > tbody > tr > td, 
    .table > tbody > tr > th,
    .table > thead > tr > td, 
    .table > thead > tr > th {
        padding: 15px;
        background-color: #fff;
        border-top-color: #EEEEEE;
    }

    .table > tbody > tr:hover > td {
        background-color: #FAFAFA;
    }

    @media (max-width: 767px) {
        .table-no-more,
        .table-no-more > thead,
        .table-no-more > thead > tr,
        .table-no-more > thead > tr > th,
        .table-no-more > tbody,
        .table-no-more > tbody > tr,
        .table-no-more > tbody > tr > td {
            display: block;
        }
        
        .table-no-more > thead {
            position: absolute;
            top: -9999px;
            left: -9999px;
            opacity: 0;
        }
        
        .table-no-more > tbody > tr > td {
            position: relative;
            padding-left: 45%;
        }
        
        .table-no-more > tbody > tr:nth-child(even) > td {
            background-color: #ffffff;
        }
        
        .table-no-more > tbody > tr:nth-child(odd) > td {
            background-color: #FAFAFA;
        }
        
        .table-no-more > tbody > tr > td:before {
		    position: absolute;
		    top: 15px;
		    left: 5%;
		    width: 40%;
		    white-space: nowrap;
            font-weight: bold;
        }
        
        .table-no-more > tbody > tr > td:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 40%;
            height: 100%;
            border-right: 1px solid #EEEEEE;
        }
        
        .table-no-more > tbody > tr > td:nth-of-type(1):before {content: "DATE";}
        .table-no-more > tbody > tr > td:nth-of-type(3):before {content: "TIME";}
        .table-no-more > tbody > tr > td:nth-of-type(2):before {content: "ITINERARY";}
        .table-no-more > tbody > tr > td:nth-of-type(4):before {content: "ADDRESS";}
        .table-no-more > tbody > tr > td:nth-of-type(5):before {content: "";}

</style>

<?php
include "footer.php";
?>
