<?php
class InputFactory {
	
	var $input;
	
	function __construct($array=array()) {
		$this->input = $array;
	}
	
	private function validate($value) {
		if (!is_numeric($value)) {			
			$value = $this->specialChars($value);
			$value = htmlspecialchars($value,ENT_QUOTES);
		}
	
		return $value;
	}
	
	function specialChars($value) {
		
		/*
		$value = str_replace("Æ","&AElig;",$value);
		$value = str_replace("æ","&aelig;",$value);
		
		$value = str_replace("å","&aring;",$value);
		$value = str_replace("Å","&Aring;",$value);
		
		$value = str_replace("ø","&oslash;",$value);
		$value = str_replace("Ø","&Oslash;",$value);	
		*/
		
		return $value;
	}
	
	/** Finds an item with 'name' = $name
	 * 
	 * @param string $name
	 * 
	 * @return array
	 */
	private function find($name) {
		$out = null;//Return null if all fails
		
		//Check if input holds any data
		if (!empty($this->input)) {
			foreach($this->input as $i=>$item) {
				//If name matches $name exactly 
				if ($item['name'] === $name) { 
					$item['id'] = $i;//Add the row num to item
					$out = $item;//Set item as return item
				}
			}
		}		
		
		return $out;
	}
	
	function add($name,$value) {
		$a['name'] = $name;
		$a['value'] = $this->validate($value);
		
		$this->input[] = $a;
	}
	
	function get($name=null) {
		if ($name == null) { return $this->input; }
		else { return $this->find($name); }
	}
	
	function update($row,$name,$value) {
		$a['name'] = $name;
		$a['value'] = $value;
		
		$this->input[$row] = $a;
	}
	
	function remove($name) {
		$item = $this->find($name);
		if ($item != null) { unset($this->input[$item['id']]); }
	}
	
	/** Converts $this->input to standard 2d assoc array
	 * 
	 * @return array
	 */
	function to_array() {
		$out = array();
		
		foreach($this->input as $item) {
			$out[$item['name']] = $item['value'];
		}
		
		return $out;
	}
}
?>