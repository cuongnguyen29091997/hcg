<?php 
include_once "BaseModel.php";
class Account extends BaseModel
{
	function __construct() {
		$this->_table = 'account';
		Parent::__construct();
	}
	public function checklogin($username, $password) {
		$conditions = __SQL::createCondition(array(['username','password']));
		$sql = str_replace("1=1",$conditions,__SQL::getOne($this->_table));
		$query = $this->stmt->prepare($sql);

		$query->bindParam(":username", $username);
		$query->bindParam(":password", $password);
		try {
			$query->execute();
		} catch(Exception $e) {
			echo $e;
			die();
			return -1;
		}
		if(!$query->rowCount()) return -1;
		return $query->fetch();
	}
}
?>