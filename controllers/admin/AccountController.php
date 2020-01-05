<?php 
	require_once ("controllers/admin/BaseController.php");
	class AccountController extends BaseController	
	{
		function __construct()
		{
			require_once("models/Account.php");
			parent::__construct('admin/views/account');// folder;
	  		$this->prt = new Account;
		}
		public function login() {
			$data = [];
			$this->render('login', $data);
		}
		public function logout() {
			unset($_SESSION['username']);
			unset($_SESSION['role']);
			header('Location: /cms-admin/account/login');
		}
		public function checkLogin() {
			if(!isset($_POST['username']) || !isset($_POST['password'])) {
				$_SESSION['message'] = 'Tài khoản hoặc mật khẩu không đúng';
				header('Location: /cms-admin/account/login');
			} else {
				$res = $this->prt->checkLogin($_POST['username'], $_POST['password']);
				if($res === -1) {
					$_SESSION['message'] = 'Tài khoản hoặc mật khẩu không đúng';
					header('Location: /cms-admin/account/login');
				} else {
					$_SESSION['username'] = $res['username'];
					$_SESSION['role'] = $res['role'];
					header('Location: /cms-admin/benh/index');
				}
			}
		}
	}
?>