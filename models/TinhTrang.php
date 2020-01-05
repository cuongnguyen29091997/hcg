<?php 
include_once "BaseModel.php";
class TinhTrang extends BaseModel
{
	function __construct() {
		$this->_table = 'answers';
		Parent::__construct();
	}
}
?>