<?php 
include_once "BaseModel.php";
class TrieuChung extends BaseModel
{
	function __construct() {
		$this->_table = 'symptom';
		Parent::__construct();
	}
}
?>