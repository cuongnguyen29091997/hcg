<?php 
include_once "BaseModel.php";
class Rules extends BaseModel
{
	function __construct() {
		$this->_table = 'rules';
		Parent::__construct();
	}
}
?>