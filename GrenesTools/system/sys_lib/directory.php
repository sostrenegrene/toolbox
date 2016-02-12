<?php
/*
 * Created on 01/02/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class DirectoryHandler {
 	
 	var $folders;
 	var $rootFolder;
 	var $dirHandle;
 	
 	function DirectoryHandler() { 		
 	}
 	
 	/** Opens the selected directory
 	 * 
 	 */
 	function openDir($newDir) {
 		$this->rootFolder = $newDir;
 		
 		$this->dirHandle = opendir($this->rootFolder);
 		
 		$this->readDirectory();
 	}
 	
 	/** Opens the $newDir directory
 	 *
 	 */
 	function open($newDir) {
 		$this->rootFolder = $newDir;
 		
 		if ($this->rootFolder != null) {
 			$this->dirHandle = opendir($this->rootFolder);
 			$this->readDirectory();
 		}
 		
 		return $this->getDirectory();
 	}
 	
 	/** Makes a list of files and directories in the selected directory 
 	 * 
 	 */
 	function readDirectory() {
 		$array = "";
 		$i=0;
 		
 		//print "Directory Handle: " . $this->dirHandle ."<br>";
 		//print "Files:<br>";
 		
 		while (false !== ($file = readdir($this->dirHandle)) ) {
 			
 			if ( ($file != '.') && ($file != '..') ) {
 				
 				$this->folders[$i++] = $file;
 			}
 			 					
 		}
 		
 		closedir($this->dirHandle);
 		
 		//$this->printDir();
 		
 	} 
 	
 	/** Returns the list f files and directories from the selected directory
 	 * 
 	 */
 	function getDirectory() {
 		return $this->folders;
 	}
 	
 	function get_rows() {
 		return count($this->folders);
 	}
 	
 	/** Prints a list of files and directories in the selected directory
 	 * Mostly used for debugging
 	 */
 	function printDir() {
 		
 		for ($i=0; $i<$this->get_rows(); $i++) {
 			print $this->folders[$i] . "<br>";
 		}
 		
 		print "<br>";
 	}
 		
 	
 	
 }//END class 
?>