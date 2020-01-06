<?php 
include_once "BaseModel.php";
class TrieuChungThamVan extends BaseModel
{
	function __construct() {
		$this->_table = 'symptom_query';
		Parent::__construct();
	}
}
?>