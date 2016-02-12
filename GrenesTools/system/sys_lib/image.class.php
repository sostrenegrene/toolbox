<?php

class Image {
	
	var $height = null;
	var $width = 500;
	var $filename;
	var $text = "";
	
	function __construct($filename) {
		$this->filename = $filename;
	}
	
	public function setWidth($width) {
		$this->width = $width;
	}
	
	public function setHeight($height) {
		$this->height = $height;
	}
	
	public function setText($text) {
		$this->text = $text;
	}
	
	private function w_scaling() {
		$out = array();
		
		// Get new sizes
		list($W_orig, $H_orig) = getimagesize($this->filename);
		
		if ($this->width < $W_orig) {				
			//Scaling for image height
			$scale = $W_orig / $this->width;
		
			//Image height
			$out['height'] = $H_orig / $scale;
			$out['width'] = $this->width;
			$out['width_orig'] = $W_orig;
			$out['height_orig'] = $H_orig;
		}
		else {
			$out['width'] = $W_orig;
			$out['height'] = $H_orig;
			$out['width_orig'] = $W_orig;
			$out['height_orig'] = $H_orig;
		}
		
		return $out;
	}
	
	private function h_scaling() {
		$out = array();
	
		// Get new sizes
		list($W_orig, $H_orig) = getimagesize($this->filename);
	
		if ($this->height < $H_orig) {
	
			//Scaling for thumbnail height
			$scale = $H_orig / $this->height;
	
			if (($W_orig / $scale) < $this->width) {
				//Thumbnail height
				$out['width'] = $W_orig / $scale;
				$out['height'] = $this->height;
				$out['width_orig'] = $W_orig;
				$out['height_orig'] = $H_orig;
			}
			else {
				$out = $this->w_scaling();
			}
		}
		else {
			
			if ($W_orig < $this->width) {
				$out['width'] = $W_orig;
				$out['height'] = $H_orig;
				$out['width_orig'] = $W_orig;
				$out['height_orig'] = $H_orig;
			}
			else {
				$out = $this->w_scaling();
			}
		}
		
		return $out;
	}
	
	private function get_scaling() {
		
		if ($this->height != null) { $out = $this->h_scaling(); }
		else { $out = $this->w_scaling(); }
		
		return $out;
	}	
	
	public function make() {
		// Content type
		header('Content-type: image/jpeg');
		
		$dim = $this->get_scaling();
		
		$size = getimagesize($this->filename);
		
		// Load thumb
		$thumb = imagecreatetruecolor($dim['width'], $dim['height']);
		
		//Load image based on mime type
		switch($size['mime']) {
		
			case 'image/jpeg':
				$source = imagecreatefromjpeg($this->filename);
				break;
		
			case 'image/gif':
				$source = imagecreatefromgif($this->filename);
				break;
		
			case 'image/png':
				$source = imagecreatefrompng($this->filename);
				break;
		
		}//END switch
		
		
		// Resize
		imagecopyresized($thumb, $source, 0, 0, 0, 0, $dim['width'], $dim['height'], $dim['width_orig'], $dim['height_orig']);
		
		$text_color = imagecolorallocate($thumb,255,255,255);
		//$text = "By Easterfarm " . date("Y");
		imagestring($thumb, 2,5,($dim['height'] - 12), $this->text, $text_color);
		
		// Output
		imagejpeg($thumb);
		imagedestroy($thumb);		
	}
	
	public function make2() {
		// File and new size
		$filename = $_GET['file'];
		
		if (isset($_GET['width'])) { $width = $_GET['width']; }
		else { $width = 500; }
		
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
		$text = "By Easterfarm " . date("Y");
		imagestring($thumb, 2,5,($thumbHeight - 12), $text, $text_color);
		
		// Output
		imagejpeg($thumb);
		imagedestroy($thumb);
	}
	
}//ENd class
?>