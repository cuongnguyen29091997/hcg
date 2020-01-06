<?php 
include_once "BaseModel.php";
class Benh extends BaseModel
{
	function __construct() {
		$this->_table = 'sickness';
		Parent::__construct();
	}
}
?>