<?php 
	class Stack
	{
		public $data = [];
		public function push($value) {
			array_push($this->data, $value);
		}
		public function pop() {
			if(sizeof($this->data) === 0) return null;
			return array_pop($this->data);
		}
		public function back() {
			if(sizeof($this->data) === 0) return null;
			return end($this->data);
		}
		public function toString() {
			return implode(";", $this->data);
		}
		public function isEmpty() {
			return sizeof($this->data) == 0;
		}
	}
 ?>