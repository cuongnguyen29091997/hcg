<?php
	/**
	 * 
	 */
	const MAXIMUM_ROW = 30;
	class __SQL
	{
		public function createCondition($conditions = array(), $isNull = []) {
			$res = "";
			foreach ($conditions as $condition) {
				$con = "(";
				if(is_array($condition)) {
					foreach ($condition as $field) {
						if(isset($isNull[$file])) {
							$con .= "$field IS NULL AND ";
						} else $con .= "$field=:$field AND ";
					}
					$con = trim($con," AND ") . ")";
				} else {
					if(isset($isNull[$condition])) {
						$con .= "$condition IS NULL)";
					} else $con .= "$condition=:$condition)";
				}
				$res .= " OR " . $con;
			}
			return trim($res," OR ");
		}

		public function createConditionOrArray($key,$arrayConditions) {
			$res = "`$key` in (";
			foreach ($arrayConditions as $value) {
				$res .= $value . ",";
			}
			return trim($res,",") . ")";
		}

		public function getOne($table) {
			return "SELECT * FROM $table WHERE 1=1 LIMIT 1";
		}
		public function getAllByRefer($table, $tableRefer,$column = 'id',$columnRefer = false) {
			if(!$columnRefer) $columnRefer = $tableRefer . "_id";
			return "SELECT $table.* FROM $table JOIN $tableRefer ON $table.$columnRefer = $tableRefer.$column WHERE 1=1";
		}
		public function getAll($table) {
			return "SELECT * FROM $table WHERE 1=1";
		}
		public function getPage($table, $page = 1) {
			$startPage = MAXIMUM_ROW * ($page - 1) ;
			$endPage = MAXIMUM_ROW * $page;
			return "SELECT * FROM $table WHERE 1=1 LIMIT $startPage, $endPage";
		}

		public function update($table) {
			return "UPDATE `$table` SET attribute=:attribute WHERE condition=:condition";
		}

		public function delete($table) {
			return "DELETE FROM $table WHERE attribute=:attribute";
		}

		public function store($table) {
			return "INSERT INTO `$table` (attributes) VALUES (values)";
		}
		public function getNewArticles() {
			return "SELECT * FROM article ORDER BY created_at DESC LIMIT 6";
		}
		public function getNewProjects() {
			return "SELECT * FROM project ORDER BY created_at DESC LIMIT 6";
		}
		public function getNewProducts() {
			return "SELECT * FROM product ORDER BY rank DESC LIMIT 10";
		}

		public function getCommonInformation() {
			return "SELECT id,information FROM common LIMIT 1";
		}

		public function getCommonHomePage() {
			return "SELECT id,homepage FROM common LIMIT 1";
		}

		public function getTopArticle() {
			return "SELECT * FROM article ORDER BY view DESC LIMIT 6";
		}

		public function updateCommon($table) {
			return "UPDATE $table SET (attributes) WHERE id=:id";
		}
	}
