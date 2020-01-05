<?php 
	require_once ("BaseController.php");
	require_once ("models/CategoryProduct.php");
	require_once ("models/Product.php");
	require_once ("class-common/MultipleUpload.php");
	class ProductController extends BaseController	
	{
		function __construct()
		{
			$this->folder = 'admin/views/product';
			$this->_dir = 'common/uploads/product-image/';
	  		$this->prt = new Product;
	  		$this->categorys = new CategoryProduct;
	  		$this->categorys = $this->categorys->getAll();
	  		if(!$this->categorys['status']) {
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data['category-products'] = [];
				$this->render('index', $data);
				die();	  			
	  		} else $this->categorys = $this->categorys['data'];
	  		$this->mapCategory = [];
			foreach ($this->categorys as $category) {
				$this->mapCategory[$category->id] = $category->name;
			}
			foreach ($this->categorys as &$category) {
				$category->parent = isset($category->parent_id) ? $this->mapCategory[$category->parent_id] : "Gốc";
			}
		}
		public function index() {
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$dataModel = $this->prt->getPage($page);
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data['product'] = [];
				$this->render('index', $data);
				die();
			}
			$data['products'] = $dataModel['data'];

			foreach ($data['products'] as &$product) {
				$product->category_id = isset($product->category_id) ?  $this->mapCategory[$product->category_id] : "Chưa cập nhật";
				$product->status = $product->status ? "Có sẵn" : "Đặt hàng";
			}
			$this->render('index', $data);
		}

		public function create() {
			$data['category-products'] = $this->categorys;
			return $this->render("create", $data);	
		}

		public function edit() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$dataModel = $this->prt->getById($id);
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Không tìm thấy dữ liệu cần chỉnh sửa";
				header("location: /cms-admin/product/index");
			} else $data['product'] = $dataModel['data'];
			$data['category-products'] = $this->categorys;
			$this->render("edit",$data);
		}
		public function update() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$_POST['id'] = $id;
			if(!$_POST['status']) $_POST['status'] = 0;
			$upload = new MultipleUpload($_FILES['images'],$this->_dir,array("jpeg","jpg","png","gif")); 
			$upload = $upload->getResult();
			if(!$upload['status'] && $_FILES['images'] !== []) {
				$_SESSION['message'] = $upload['message'];
				header("Location: /cms-admin/product/create");
				die();
			}
			$_POST['images'] = $upload['path'];
			foreach ((isset($_POST['old_img']) ? $_POST['old_img'] : array()) as $path => $value) {
				array_push($_POST['images'], $path);
			}
			$_POST['hidden']['old_img'] = explode(";;", $_POST['hidden']['old_img']);
			foreach ($_POST['hidden']['old_img'] as $link) {
				if(!in_array($link, $_POST['images'])) {
					unlink($this->_dir.$link);
				}
			}
			$_POST['images'] = implode(";;", $_POST['images']);
			unset($_POST['old_img']);
			unset($_POST['hidden']);
			$dataModel = $this->prt->update($_POST,"id");
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Cập nhật không thành công ! - " . $dataModel['message'];
			} else {
				$_SESSION['message'] = "Cập nhật thành công !";
			}
			header("Location: /cms-admin/product/edit/".$_POST['id']);
		}
		public function delete() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;

			$dataModel = $this->prt->getById($id);
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Không tìm thấy trang";
				header("location: /cms-admin/product/index");
			} else $data['product'] = $dataModel['data'];

			// Unlink ảnh sản phẩm
			$dataModel = $this->prt->delete(array("id" => $id));
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Xóa không thành công ! - " . $dataModel["message"];
			} else {
				$_SESSION['message'] = "Xóa thành công !";	
				foreach (explode(";;",$data['product']['images']) as $link) {
					unlink($this->_dir . $link);
				}
			}
			header("Location: /cms-admin/product/index");
		}
		public function store() {
			$upload = new MultipleUpload($_FILES['images'],$this->_dir,array("jpeg","jpg","png","gif")); 
			$upload = $upload->getResult();
			if(!$upload['status']) {
				$_SESSION['message'] = $upload['message'];
				header("Location: /cms-admin/product/create");
				die();
			}
			else {
				$_POST['images'] = implode(";;", $upload['path']);				
			}
			$dataModel = $this->prt->store($_POST);
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Thêm mới không thành công ! - " . $dataModel["message"];
				header("Location: /cms-admin/product/create");
			} else {
				$_SESSION['message'] = "Thêm mới thành công !";
			}
			header("Location: /cms-admin/product/index");
		}
	}
?>