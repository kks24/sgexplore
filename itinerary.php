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
    </head>
    <body>
        <?php
        include 'header.php'
        ?>
        <div id="plan">
            <h2>Plan itinerary</h2>
            <table>
                <tr>
                    <td>Select date of visiting: <input type ="date" size="50"></td>
                    <td>Expected Weather: <br></td>
                </tr>
                <tr>
                    <td><input type="radio" name="search" value="male" checked="check"> Search for Place: 
                        <input type ="search" size="18">
                    </td>
                    <td> <input type="radio" name="search" value="male"> Select Category: 
                        <select name="category"> 
                            <option value="A">Category C</option>
                            <option value="A">Category B</option>
                        </select> <br></td>
                </tr>
            </table>








            <br>
        </div>
        <div id ="current">
            Current Itinerary
        </div>

    </body>
</html>