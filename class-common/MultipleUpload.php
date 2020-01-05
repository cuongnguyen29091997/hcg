<?php 
	class MultipleUpload
	{
		private $_upload, $_dir, $_size, $_allowed, $_result = array("status" => true, "path" => array(), "message" => "");		
		function __construct($upload = array(),$dir,$allowed)
		{
			$this->_upload = $upload;
			$this->_dir = $dir;
			$this->_allowed = $allowed;
			$this->Upload();
		}
		
		private function Upload() {
			if(!is_array($this->_upload)) {
				$_result = ["path" => false, "status" => false, "message" => "Chỉ áp dụng cho danh sách hình ảnh"];
				return;
			}
			foreach($this->_upload["tmp_name"] as $key => $tmp_name) {
				if($tmp_name === "") continue;
			    $file_name = $this->_upload["name"][$key];
			    $file_tmp = $this->_upload["tmp_name"][$key];

			    $ext = pathinfo($file_name,PATHINFO_EXTENSION);

			    if(in_array($ext , $this->_allowed)) {
			        if(!file_exists($this->_dir . $key . "_" . $file_name)) {
			            move_uploaded_file($file_tmp = $this->_upload["tmp_name"][$key], $this->_dir . $key . "_" . $file_name);
			            array_push($this->_result['path'],$key . "_" . $file_name);
			        }
			        else {
			            $filename = basename($file_name, $ext);
			            $newFileName=  $this->_dir . time() . "_" . $file_name;
			            move_uploaded_file($file_tmp=$this->_upload["tmp_name"][$key], $newFileName);
			            array_push($this->_result['path'],time() . "_" . $file_name);
			        }
			        $this->_result['status'] = true;
			        $this->_result['message'] = "Upload thành công !";
			    }
			    else {
			    	foreach ($this->_result['path'] as $path) unlink($this->_dir . "/". $path);
			    	$this->_result = ["status" => false, "path" => false, "message" => "Tất cả được tải lên đều phải là hình ảnh (Có đuôi jpg,png,jpeg,gif)"];
			    }
			}
		}

		public function getResult() {
			return $this->_result;
		}
	}
 ?>