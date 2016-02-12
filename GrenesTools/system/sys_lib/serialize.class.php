<?php

/** Serializes a simple 2D array into a string
 * Or deserializes the string into an array
 * 
 * If values should be added to the serialized string, the string
 * should be provided first and then the new values should be added
 * and then the string will be serialized again
 * If no current string exist, then a new will be created and serialised
 * 
 * @author m04319
 *
 */
class Serialize {
	
	var $values;
	var $debug;
	var $serialized;
	
	function __construct($serialized=null,$debug=false) {
		$this->values 		= array();
		$this->serialized 	= $serialized;
		$this->debug 		= $debug;
		//$this->deserialize();
	}
	
	private function debug($location,$string) {
		global $_msg;
		
		if ($this->debug == true) {
			$_msg->msg($location . ">".$string,"suc");
		}
		
	}
	
	function addValue($arg_1,$arg_2) {
		$this->debug("addValue()",$arg_1.",".$arg_2);
		
		$array[0] = $arg_1;
		$array[1] = $arg_2;
		$this->values[count($this->values)] = $array;
		
	}
	
	function updateValue($arg_1,$arg_2) {
		
		$has_arg = false;
		for ($i=0; $i<count($this->values); $i++) {
			$value = $this->values[$i];
			
			if ($value[0] == $arg_1) { 
				$value[1] = $arg_2;
				$has_arg = true; 
			}
			
			$this->values[$i] = $value;
		}
		
		//Adds the values as new values if not found in array
		if (!$has_arg) { $this->addValue($arg_1,$arg_2); }
		
	}
	
	/** Returns the value for the field $arg_1
	 * 
	 * @param $arg_1
	 * @return Obj
	 */
	function getValue($arg_1) {
		$out = null;
		
		if (isset($this->values)) {
			
			foreach ($this->values as $value) {
				
				if ($value[0] == $arg_1) { $out = $value[1]; }
				
			}//ENd foreach
			
		}
		else {
			$out = 0;	
		}//END if

		return $out;
	}
	
	function getValues() {
		return $this->values;
	}
	
	function deserialize() {
		$this->debug("Deserialize()","init");
		$this->values = array();
		
		if ($this->serialized != null) {
			$this->debug("Deserialize()","has values");
			
			$this->serialized = substr($this->serialized, 0,(strlen($this->serialized)-1));
			//print $this->serialized;
			$array = explode("|",$this->serialized);
			
			//print_r($array);
			for($i=0; $i<count($array); $i++) {
				$item = $array[$i];
				
				//print ">> ". $item;
				
					$exp = explode(",",$item);
					
					if (isset($exp[1])) {
						$this->values[$exp[0]] = $exp[1];
					} 
				
			}//END foreach
		}//END if		

		//print $this->serialized;
		//print "<pre>";
		//print_r($this->values);
		//print "</pre>";
		
		return $this->values;		
	}//END
	
	function serialize() {
		$out = "";
		
		//print_r($this->values);
		if (isset($this->values)) {
		
			foreach($this->values as $item) {
				
				if (isset($item[1])) {
					$out .= $item[0] . "," . $item[1] . "|";
				}//END if
				
			}//END foreach
			
		}//END if
		
		$this->serialized = $out;
		
		return $out;
	}
	
	
	
	
}//END class
?>