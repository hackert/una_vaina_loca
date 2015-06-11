<?php

//Widht of the barcode image. 
$width  = 284;  
//Height of the barcode image.
$height = 184;
//Quality of the barcode image. Only for JPEG.
$quality = 100;
//1 if text should appear below the barcode. Otherwise 0.
$text =1;
// Location of barcode image storage.
$location = Yii::getPathOfAlias("webroot").'/bc';
 
Yii::import("application.extensions.barcode.*");                      
barcode::Barcode39('some text', $width , $height , $quality, $text, $location);


?>