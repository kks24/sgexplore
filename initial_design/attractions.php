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
        include 'header.php';
        $category = isset($_GET['category']) ? $_GET['category'] : "";
        ?>
        <div id="content">
            <h2><?php echo $category ?></h2>

            <h4>Gardens By The Bay</h4>
            <img src="img/gbtb.jpg" width=90%" >
            <p>Description of GBTB</p>

            <h4>Gardens By The Bay</h4>
            <img src="img/gbtb.jpg" width=90%" >
            <p>Description of GBTB</p>
            
        </div>
        <?php
        include 'STBWidget.php';
        ?>
    </body>
</html>
