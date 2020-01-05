<?php 
	require_once ("BaseController.php");
	require_once ("models/Common.php");
	require_once ("class-common/Upload.php");
	require_once ("class-common/MultipleUpload.php");
	class CommonController extends BaseController	
	{
		function __construct()
		{
			$this->folder = 'admin/views/common';
			$this->_dir = 'common/uploads/common-page-image/';
	  		$this->prt = new Common;
		}
		function editHomePage() {
			$data = [];
			$dataModel = $this->prt->getCommon("getCommonHomePage","fetch", false);
			if(!$dataModel['status']) {
				$data['home-page'] = [];
			} else $data['home-page'] = json_decode($dataModel['data']['homepage']);
			$data['id_homepage'] = $dataModel['data']['id'];
			$this->render('home-page',$data);
		}
		function updateHomePage() {
			$id = (int)$_POST['id'];
			unset($_POST['id']);
			$homepage = json_encode($_POST);
			// banner
			if(isset($_FILES['banners']['name'][0]) && $_FILES['banners']['name'][0] !== "") {
				$upload = new MultipleUpload($_FILES['banners'],$this->_dir,array("jpeg","jpg","png","gif")); 
				$upload = $upload->getResult();
				if(!$upload['status'] && $_FILES['images'] !== []) {
					$_SESSION['message'] = $upload['message'];
					header("Location: /cms-admin/common/edit-home-page");
					die();
				}
				$_POST['banners'] = $upload['path'];
				$old_banners = (isset($_POST['old_banners']) && $_POST['old_banners'] != "") ? explode(";;", $_POST['old_banners']) : [];
				foreach ($old_banners as $link) {
					unlink($this->_dir.$link);
				}
				$_POST['banners'] = implode(";;", $_POST['banners']);
				unset($_POST['old_banners']);
			} else {
				$_POST['banners'] = isset($_POST['old_banners']) ? $_POST['old_banners'] : "";
			}

			$arrayFiles = ["image_left","image_right","image_bottom"];
			foreach ($arrayFiles as $key => $getFile) {
				if(isset($_FILES[$getFile]) && $_FILES[$getFile]['name'] !== "") {
					$upload = new Upload($_FILES[$getFile],$this->_dir,5000000,array("jpeg","jpg","png","gif")); 
					$upload = $upload->getResult();
					if(!$upload['status']) {
						$_SESSION['message'] = $upload['message'];
						header("Location: /cms-admin/common/edit-home-page");
						die();
					}
					$_POST[$getFile] = $upload['path'];
				} else {
					$_POST[$getFile] = isset($_POST['old_' . $getFile]) ? $_POST['old_' . $getFile] : "";
				}
				if(isset($_POST['old_' . $getFile])) unset($_POST['old_'. $getFile]);
			}

			// avt customer 
			foreach ($_POST['response_customer'] as $keyHidden => $resp) {
				if(isset($_FILES[$keyHidden]) && $_FILES[$keyHidden]['name'] !== "") {
					$upload = new Upload($_FILES[$keyHidden],$this->_dir,5000000,array("jpeg","jpg","png","gif")); 
					$upload = $upload->getResult();
					if(!$upload['status']) {
						$_SESSION['message'] = $upload['message'];
						header("Location: /cms-admin/common/edit-home-page");
						die();
					}
					$_POST['response_customer'][$keyHidden]['avt'] = $upload['path'];
				}
			}
			$homepage = json_encode($_POST);
			$result = $this->prt->updateCommon("updateCommon",['homepage' => $homepage, "id" => $id]);
			$_SESSION['message'] = $result ? "Cập nhật thành công !" : "Cập nhật không thành công !";
			header("Location: /cms-admin/common/edit-home-page");
		}
		function editInformation() {
			$data = [];
			$dataModel = $this->prt->getCommon("getCommonInformation","fetch", false);
			if(!$dataModel['status']) {
				$data['information-page'] = [];
			} else $data['information-page'] = json_decode($dataModel['data']['information']);
			$data['id_information'] = $dataModel['data']['id'];
			$this->render('information',$data);
		}
		function updateInformation() {
			$id = (int)$_POST['id'];
			unset($_POST['id']);
			$information = json_encode($_POST);
			$result = $this->prt->updateCommon("updateCommon",['information' => $information, "id" => $id]);
			$_SESSION['message'] = $result ? "Cập nhật thành công !" : "Cập nhật không thành công !";
			header("Location: /cms-admin/common/edit-information");
		}
	}
?>