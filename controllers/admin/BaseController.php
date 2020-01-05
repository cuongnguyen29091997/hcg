<?php
class BaseController
{
    protected $alertInfo = ["failed" => "danger", "success" => "success", "info" => "info"];
    protected $folder = '';
    protected function __construct($folder) {
        $this->folder = $folder;
    }

    public function render($file, $data = array())
    {
        $view_file = $this->folder . '/' . $file . '.php';
        if(isset($_SESSION['message'])) {
            $data['message'] = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        if(isset($_SESSION['info-mess'])) {
            $data['info-mess'] = $_SESSION['info-mess'];
            unset($_SESSION['info-mess']);
        }
        if (is_file($view_file)) {
          require_once($view_file);
        } else {
            header("Location : /cms-admin/account/login");
        }
    }
}