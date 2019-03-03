<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>SGXplore</title>
        <link rel="stylesheet" type="text/css" href="SGXplore.css">
        <script type="text/javascript">

            function dateChanged() {
                if (document.getElementById("date").value != null) {
                    for (i = 0; i < document.getElementsByName("search").length; i++) {
                        document.getElementsByName("search")[i].disabled = false;
                    }
                    document.getElementsByName("search")[0].checked = true;
                    document.getElementById("selectCat").disabled = true;
                    document.getElementById("current").append(document.getElementById("date").value);
                }
            }


            function placeSelected() {
                document.getElementById("selectCat").disabled = true;
                document.getElementById("keyword").disabled = false;
            }

            function catSelected() {

                document.getElementById("selectCat").disabled = false;
                document.getElementById("keyword").disabled = true;
            }
        </script>
    </head>
    <body>
        <?php
        include 'header.php'
        ?>
        <div id="plan">
            <h2>Plan itinerary</h2>
            <table>
                <tr>
                    <td>Select date of visiting: <input type ="date" id="date"  onchange="dateChanged()" size="50"></td>
                    <td>Expected Weather: <br></td>
                </tr>
                <tr>
                    <td><input  type="radio" name="search" value="place" onchange="placeSelected()" disabled> Search for Place: 
                        <input type ="search" id="keyword" size="18" disabled>
                    </td>
                    <td> <input type="radio" name="search" value="category" onchange="catSelected()" disabled> Select Category: 
                        <select name="category" id ="selectCat" disabled> 
                            <option value="A">Category A</option>
                            <option value="B">Category B</option>
                        </select> <br>
                    </td>
                </tr>
            </table>

            <div id="results">

            </div>
        </div>

        <div id ="current">
            Current Itinerary:<br>
            
        </div>

    </body>
</html>
