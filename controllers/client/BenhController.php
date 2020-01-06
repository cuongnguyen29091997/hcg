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
		function index() {
			$benhMd = new Benh;
			$benhs = $benhMd->getAll();
			if(!$benhs['status']) $this->error(); 
			$data['benhs'] = $benhs['data'];
			$this->render('index', $data);
		}
		function show() {
			$dataModel = $this->prt->getById($_GET['id']);
	        if(!$dataModel['status']) {
	        	header("Location: /home/index");
            	die();              
        	} else $data['benh'] = $dataModel['data'];
        	$data['panel-title'] = "Bệnh : ".$data['benh']['name'];
        	$data['title'] = "Bệnh : ".$data['benh']['name'];
        	$this->render('show',$data);
		}
	}
?>