<?php 
include_once "BaseModel.php";
class BenhTinhTrang extends BaseModel
{
	function __construct() {
		$this->_table = 'rules';
		Parent::__construct();
	}
}
?>