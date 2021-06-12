<html lang="en">
<head>
<meta charset="utf-8">
<title>Bartender</title>
<link rel="stylesheet" type="text/css" href="bartender.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">

<script>
	function printDiv(divName){
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
    }

    function shotMode(){
        //hide all divs by class "vinDiv" but make div$i visable
        var vindivs = document.getElementsByClassName('vinDiv');
        var i;
        for (i=0;i<vindivs.length;i++){
            vindivs[i].style.display="none";
        } 
        vindivs[0].style.display="block";
    }

    function prevShot(){
        //decrement visible div by -1
    }

    function nextShot(){
        // incriment visible div by 1
    }

</script>

</head>

<body>

<div class="imglogo">
	<div class="bumpers"></div>
	<div class="center-block">
	<img id="bartenderbeer" src="BartenderBeer.png"><img id="bartenderwords" src="BartenderWords.png">
	</div>
	<div class="bumpers"></div>
</div>
<div class="linediv"></div>


<!-- THIS IS WHERE USERS WILL PASTE THEIR VINS -->
<form action="" method="post">
<label id="instruction" for="vininput">Place your order below ⤵️</label>
<textarea name="vininput" id="vininput" rows="8" cols="50"></textarea>
<input type="submit" id="cheersbutton" value="Cheers🍻">
<form>


</p>
<p id="barcodes">


<?php
require 'vendor/autoload.php';

//TODO: if vinlist is empty output "you need to enter something, anything!"
$vinlist = $_POST['vininput'];
$vins = explode(PHP_EOL, $vinlist);   
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
$vinslength = count($vins);

  for($i=0;$i<count($vins);$i++){
        $vin = trim($vins[$i],"\r");
	echo '<div class="vinDiv" id=div'.$i.'><img src="data:image/png;base64,' . base64_encode($generator->getBarcode($vin, $generator::TYPE_CODE_128)) . '">';
        echo '<br><br>';
        echo $vin;
        echo '<br><br></div>';
}
?>
<button type='button' onclick="shotMode()">Shots</button>
<button onclick="prevShot()">Prev</button>
<button onclick="nextShot()">Next</button>
<br><br>
<button onclick="printDiv('barcodes')">Print</button>
</body>


</html>
