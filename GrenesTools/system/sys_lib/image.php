<?php
/*
 * Created on 01/02/2008
 *
 * This file generates a resized version of the submitted image
 */
 
  
 // File and new size
$filename = $_GET['file'];

if (isset($_GET['width'])) { $width = $_GET['width']; }
else { $width = 500; }

if ( (isset($_GET['copyr']) && ($_GET['copyr']) == "false")) { $copyr = false; }
else { $copyr = true; }

// Content type
header('Content-type: image/jpeg');

$size = getimagesize($filename);

// Get new sizes
list($W_orig, $H_orig) = getimagesize($filename);

//Thumbnail width
$thumbWidth = $width;

if ($thumbWidth < $W_orig) {
	//Scaling for thumbnail height
	$scale = $W_orig / $thumbWidth;
	
	//Thumbnail height
	$thumbHeight = $H_orig / $scale;
}
else {
	$thumbWidth = $W_orig;
	$thumbHeight = $H_orig;
}
// Load thumb
$thumb = imagecreatetruecolor($thumbWidth, $thumbHeight);

	//Load image based on mime type
	switch($size['mime']) {
	
		case 'image/jpeg':
			$source = imagecreatefromjpeg($filename);
		break;
		
		case 'image/gif':
			$source = imagecreatefromgif($filename);
		break;
		
		case 'image/png':
			$source = imagecreatefrompng($filename);
		break;

	}//END switch
	

// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $W_orig, $H_orig);

$text_color = imagecolorallocate($thumb,255,255,255);
if ($copyr) { $text = "By Easterfarm " . date("Y"); }
else { $text = ""; }
imagestring($thumb, 2,5,($thumbHeight - 12), $text, $text_color);

// Output
imagejpeg($thumb);
imagedestroy($thumb); 
?>