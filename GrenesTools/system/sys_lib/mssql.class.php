<?php
require_once __DIR__.'/QueryFactory.class.php';
require_once __DIR__.'/InputFactory.class.php';

/*
 * Created on 2006-02-21
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class MS_SQL {
 	
 	var $conn;
 	var $result; 	
 	var $rows;
 	
 	function __construct($host,$user,$password,$database) { 		
		$host = $host ."\\".$database;
		$logon['Database'] = $database;
		$logon['UID'] = $user;
		$logon['PWD'] = $password;		
		
 		$this->conn = sqlsrv_connect($host,$logon);
 	
		if (!$this->conn) { 
			print "Failed to connect";				
			print $this->error();
		}
		
 	}//END function
 	 	
 	function query($query) {
 		
 		if ($this->conn) {
			$params = array();
			$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
			//$this->result = sqlsrv_query($this->conn,$query);
			$this->result = sqlsrv_query($this->conn,$query,$params,$options);			
		}
 		
		$this->rows = $this->fetch_rows();	 
		
		return $this->rows;
 	}//END function

 	function escape_str($string) {
 		return sqlsrv_escape_string($this->conn, $string);
 	}
 	
 	function error($method_name="") {
 		$out = false;
		
 		$errs = sqlsrv_errors();
 		if ($errs != null) {
			foreach($errs as $err) {
				$out .= $method_name ." -> " . $err['message'];
			}
 		}		
		
		return $out;
 	}
 	
	function num_rows() {
				
		$num_rows = 0;
		$out = "";
		
		if ($this->result != false) {			
			$num_rows = sqlsrv_num_rows($this->result);
			$out = $num_rows;		
		}
		else {
			$out = 0;
		}//END if
		
		return $out;
		
	}//END function
	
	function get_rows() {
		return $this->rows;
	}
	
	// Returns the rows from the database in an array (array(0=> row_data_array,1=>row_data_array...))
	private function fetch_rows() {		
		$num_rows = $this->num_rows();
		
		if ( ($num_rows > 0) && (sqlsrv_has_rows($this->result))) {
			
			for ($i=0; $i<$num_rows; $i++) {
				$result_array[$i] = sqlsrv_fetch_array($this->result, SQLSRV_FETCH_ASSOC);
				
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
		
	function query_factory() {
		return new QueryFactory();
	}
	
	function input_factory($array=array()) {
		return new InputFactory( $array );
	}
	
 }//END class 
?>