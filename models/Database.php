<?php 
class Database {
	private $_connection;
	private static $_instance;
	private $_host = "localhost";
	private $_username = "root";
	private $_password = "";
	private $_database = "es_illness";

	public static function getInstance() {
		if(!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	private function __construct() {
		try {
			$this->_connection = new PDO("mysql:host=$this->_host;dbname=$this->_database;charset=utf8", $this->_username, $this->_password);
			$this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->_connection->exec("set names utf8");
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	private function __clone() { }
	public function getConnection() {
		return $this->_connection;
	}
}
?>