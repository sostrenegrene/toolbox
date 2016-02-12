<?php
/*
 * Created on 2006-02-21
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class MySQL {
 	
 	var $conn;
 	var $result;
 	
 	function MySQL($host,$user,$password,$database) {
 		
 		$this->conn = mysqli_connect($host, $user, $password,$database) or die( "Unable to connect to [".$database."@".$host."]" );
 					  //mysqli_select_db($database,$this->conn);
 					   		
 	}//END function
 	 	
 	function query($query) {
 		
 		$this->result = mysqli_query($this->conn,$query);
 		
 	}//END function

 	function escape_str($string) {
 		return mysqli_real_escape_string($this->conn, $string);
 	}
 	
 	function error() {
 		return mysqli_error($this->conn);
 	}
 	
	function num_rows() {
				
		$num_rows = 0;
		$out = "";
		
		if ($this->result != null) {
			$num_rows = mysqli_num_rows($this->result);
			$out = $num_rows;		
		}
		else {
			$out = 0;
		}//END if
		
		return $out;
		
	}//END function
	
	// Returns the rows from the database in an array (array(0=> row_data_array,1=>row_data_array...))
	function get_rows() {		
		$num_rows = $this->num_rows();
		
		if ($num_rows > 0) {
			
			for ($i=0; $i<$num_rows; $i++) {
				$result_array[$i] = mysqli_fetch_array($this->result, MYSQLI_ASSOC);
				
			}//END for
			
			return $result_array;
			
		}
		else {
			return null;
			}//END if
		
	}//END function
	
	//CLoses the connection to the database
	function close_conn() {		
		mysqli_close($this->conn);
	}//END function
		 	
 }//END class 
?>