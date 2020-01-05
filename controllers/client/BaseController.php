<?php
require_once("models/BaseModel.php");
class BaseController
{
    protected $folder = '';
    protected function __construct($folder) {
        $this->folder = $folder;
    }

    public function render($file, $data = array())
    {
        if(isset($_SESSION['message'])) {
            $data['message'] = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        $view_file = $this->folder . '/' . $file . '.php';
        if (is_file($view_file)) {
          require_once($view_file);
        } else {
            header("Location : /home/index");
        }
    }
}