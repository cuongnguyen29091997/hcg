<?php 
	require_once ("BaseController.php");
	require_once ("models/Benh.php");
	class BenhController extends BaseController	
	{
		function __construct()
		{
			$this->folder = 'client/views/benh/';
			Parent::__construct($this->folder);
			$this->prt = new Benh;
		}
		function show() {
			$dataModel = $this->prt->getOneByCondition(array("key" => "alias","value" => $_GET['alias']));
	        if(!$dataModel['status']) {
	        	header("Location: /home/index");
            	die();              
        	} else $data['benh'] = $dataModel['data'];
        	$data['panel-title'] = "Bệnh : ".$data['benh']['summary'];
        	$data['title'] = "Bệnh : ".$data['benh']['summary'];
        	$this->render('show',$data);
		}
	}
?>