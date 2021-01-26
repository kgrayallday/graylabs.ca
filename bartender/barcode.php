<?php
require 'vendor/autoload.php';

$vinlist = $_POST['vininput'];
$vins = explode(PHP_EOL, $vinlist);
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
$vinslength = count($vins);

  for($i=0;$i<count($vins);$i++){
	echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($vins[$i], $generator::TYPE_CODE_128)) . '">';
	echo '<br>';
	echo $vins[$i];
	echo '<br>';
}

?>
