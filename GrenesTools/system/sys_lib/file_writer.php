<?php

class FileWriter {
	
	var $filename;
	var $stringList;
	
	function __construct($filename) {
		$this->filename = $filename;
		$this->stringList = array();
	}
	
	/** Add new string to file
	 * Each new string will be added as a new line in the file
	 * @param String $string
	 */
	function add($string) {
		$this->stringList[count($this->stringList)] = $string; 
		
		//print_r($this->stringList);
	}
	
	/** Writes the file and closes the filewriter
	 * 
	 */
	function write() {
		$input = "";		
		foreach($this->stringList as $string) {
			$input .= $string . "\n";
		}
		
		$file = fopen($this->filename,'w') or die ("can't open file!");
		fwrite($file,$input);
		fclose($file);		
	} 
	
}//ENd class
?>