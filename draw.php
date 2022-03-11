<?php

$imageUrl = $_GET['image'];
$parse = parse_url($imageUrl);
if($parse['host'] != 'textures.minecraft.net'){//Don't allow loading of any images that aren't from minecraft.net
	$imageUrl = "steve.png";//Load steve.png as default
}

$image = imagecreatetruecolor(256,256); //Create image at 64x64
$overlayImage = imagecreatefrompng($imageUrl); //Import skin
imagecopy($image, $overlayImage, 0, 0, 0, 0, imagesx($overlayImage), imagesy($overlayImage)); //Overlay skin over blank image
$im2 = imagecrop($overlayImage, ['x' => 7, 'y' => 8, 'width' => 10, 'height' => 8]); //Crop skin to just face
header("Content-Type: image/png"); //Display picture
imagepng($im2);
exit;
?>