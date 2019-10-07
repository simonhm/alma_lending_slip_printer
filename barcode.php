<?php

$barcode = $_GET["text"];

$files = glob( __DIR__ . '/BarcodeBakery/Common/*.php');
foreach ($files as $file) {
    require($file);   
}

$files = glob( __DIR__ . '/BarcodeBakery/Common/Drawer/*.php');
foreach ($files as $file) {
    require($file);
}



$files = glob( __DIR__ . '/BarcodeBakery/Barcode/*.php');
foreach ($files as $file) {
    require($file);
}

use BarcodeBakery\Common\BCGColor;
use BarcodeBakery\Common\BCGDrawing;
use BarcodeBakery\Barcode\BCGcode39;

$colorFront = new BCGColor(0, 0, 0);
$colorBack = new BCGColor(255, 255, 255);

// Barcode Part
$code = new BCGcode39();
$code->setScale(2);
$code->setColor($colorFront, $colorBack);
//$code->parse('1//01MNPALSATC0000027');
$code->parse($barcode);

// Drawing Part
$drawing = new BCGDrawing('', $colorBack);
$drawing->setBarcode($code);
$drawing->draw();

header('Content-Type: image/png');

$drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
?>
