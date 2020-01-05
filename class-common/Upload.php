<?php 
	class Upload
	{
		private $_upload, $_dir, $_size, $_allowed, $_result = array();		
		function __construct($upload = array(),$dir,$size,$allowed)
		{
			$this->_upload = $upload;
			$this->_dir = $dir;
			$this->_size = $size;
			$this->_allowed = $allowed;
			$this->Upload();
		}
		
		private function Upload(){
			if (!empty($this->_upload) && (!empty($this->_dir)) && (!empty($this->_size)) && (!empty($this->_allowed))) {
				if ((is_array($this->_upload)) && (is_array($this->_allowed))) {
					$explode = explode(".", strtolower($this->_upload['name']));
					$key = count($explode) - 1;
					$extension = $explode[$key];
					if (in_array($extension, $this->_allowed)) {
						if ($this->_upload['size'] < $this->_size) {
							$filename = $this->_upload['name'];
							$tmpname = $this->_upload['tmp_name'];
							// check file tồn tại
							if (move_uploaded_file($tmpname, $this->_dir.$filename)) {
								$this->_result['status'] = true;
								$this->_result['message'] = "File Has been uploaded";
								$this->_result['path'] = $filename;
							}else{
								$this->_result['status'] = false;
								$this->_result['message'] = "Lỗi không xác định khi tải lên " . $this->_dir.$filename;
								$this->_result['path'] = false;
							}
						}else{
							$this->_result['status'] = false;
							$this->_result['message'] = "Kích thước file quá lớn - " . $this->_upload['size'] . "byte " . $this->_size;
							$this->_result['path'] = false;
						}
					}else{
						$this->_result['status'] = false;
						$this->_result['message'] = "Kiểu dữ liệu file không hợp lệ";
						$this->_result['path'] = false;
					}
				}else{
					$this->_result['status'] = false;
					$this->_result['message'] = "Thông số upload và allowed là một mảng";
					$this->_result['path'] = false;
				}
			} else{
				$this->_result['status'] = false;
				$this->_result['message'] = "Thông số đầu vào rỗng";
				$this->_result['path'] = false;
			}
		}
		
		public function getResult(){
			return $this->_result;
		}
	}
 ?>