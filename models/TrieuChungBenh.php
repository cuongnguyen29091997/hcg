<?php 
include_once "BaseModel.php";
class TrieuChungBenh extends BaseModel
{
	function __construct() {
		$this->_table = 'symptom_sickness';
		Parent::__construct();
	}
}
?>