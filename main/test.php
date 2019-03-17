
<?php
$title = "TEST PAGE";
include "header.php";

?>



<?php
require './libs/Slim/Slim.php';
require 'Models/hawkercentres.php';
require 'include/Functions.php';




\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();


$app->get('/', function() use ($app) {
    echo '<div id = test_div>';
    echo "PDF PAGE";
    echo "TEST PDF";
    echo "</div>";
    echo '<div id = ENTIRE>';
	echo '<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/mbs.jpg)"></div>
	<section class="dorne-listing-destinations-area section-padding-100-50 id=r ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark text-center">
                        <span></span>
                        <h4>PDF TEST PAGE</h4>
                        <p>PDF TEST PAGE</p>
                    </div>
                </div>
            </div>
            <div class="row">';
    
	
    $hawkercentres = new hawkercentres();
    $result = $hawkercentres->fetchall();
    if ($result != NULL) {
        $response["error"] = false;
        $count = $result->num_rows;
        if ($count != 0){
            while ($row= $result->fetch_assoc()) {
				echo '<div class="col-12 col-sm-6 col-lg-4 id = te">
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
   
});


$app->run();

?>
            </div>
        </div>
</div>

<script type = "text/javascript" src="html2canvas.js" ></script>

<script type = "text/javascript">
    
function PDF() {
        console.log("testp");
		const filename  = 'ThisIsYourPDFFilename.pdf';
		var pdf = new jsPDF();
        pdf.fromHTML(document.getElementById("ENTIRE"),20,20,{
                     width:500});
        pdf.save(filename);
        
}
    
function photo(){
        console.log("test");
        try{
		        html2canvas(document.getElementById("test_div2"), {
                allowTaint: false,
                useCORS: true,
                logging: true,
                }).then(canvas => {         
                var imgData = canvas.toDataURL("image/png");
                window.open(imgData);
            });
        }
        
        catch(error){
                     console.log("e");
            console.log(error);
        }
}
function dof(){
    console.log("dof");
    try{

                var imgData;
                html2canvas($("#test_div"), {
                    useCORS: true,
                    onrendered: function (canvas) {
                        imgData = canvas.toDataURL(
                           'image/png');
                        var doc = new jsPDF('p', 'pt', 'a4');
                        doc.addImage(imgData, 'PNG', 10, 10);
                        doc.save('sample-file.pdf');
                        window.open(imgData);
                    }
                });
            
}
catch(error){
    console.log(error);
}

}

        </script>    
    

</script>
<div id ="test_div2">
        <textarea>asdasdasd</textarea>
</div>
<a href = "javascript:PDF()">Download PDF</a>
<a href = "javascript:photo()">Show photo</a>

    </section>


<?php
include "footer.php";
?>