<?php
class QueryFactory {
	
	var $items;
	
	function __construct() {
		$this->items = new InputFactory();
	}
	
	private function validate($value) {
		if (!is_numeric($value)) { $value = htmlspecialchars($value,ENT_QUOTES); }
		
		return $value;
	}
	
	function add($name,$value) {
		$this->items->add($name,$value);
	}
	
	function set_InputFactory($factory) {
		$this->items = $factory;
	}
	
	function insert($table) {		
		$fields = "";
		$values = "";
		foreach($this->items->get() as $i=>$item) {
			//If more than one item exist
			//Add delimiter "," for each iteam in query
			if ($i>0) {
				$fields .= ",";
				$values .= ",";
			}
			$fields .= $item['name'];
			$values .= "'".$item['value']."'";
		}
		
		$query = "INSERT INTO " . $table . " (" . $fields . ") VALUES (" . $values . ")";
		
		return $query;
	}
	
	function update($table,$where="") {
		$fields = "";		
		
		if ($where != "") { $where = " WHERE " . $where; }
		
		foreach($this->items->get() as $i=>$item) {
			//If more than one item exist
			//Add delimiter "," for each iteam in query
			if ($i>0) { $fields .= ","; }
			$fields .= $item['name'] . " = '".$item['value']."'";			
		}
	
		$query = "UPDATE " . $table . " SET " . $fields . " " . $where;
	
		return $query;
	}
	
}
?>