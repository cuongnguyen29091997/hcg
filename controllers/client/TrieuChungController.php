<?php 
	require_once ("BaseController.php");
	require_once ("models/TrieuChung.php");
	class TrieuChungController extends BaseController	
	{
		function __construct()
		{
			$this->folder = 'client/views/trieu-chung/';
			Parent::__construct($this->folder);
			$this->prt = new TrieuChung;
		}
		function index() {
			$benhs = $this->prt->getAll();
			if(!$benhs['status']) $this->error(); 
			$data['trieuChungs'] = $benhs['data'];
			$this->render('index', $data);
		}
		function show() {
			$dataModel = $this->prt->getById($_GET['id']);
	        if(!$dataModel['status']) {
	        	header("Location: /home/index");
            	die();              
        	} else $data['trieuChung'] = $dataModel['data'];
        	$data['panel-title'] = "Triệu chứng : ".$data['trieuChung']['name'];
        	$data['title'] = "Triệu chứng: ".$data['trieuChung']['name'];
        	$this->render('show',$data);
		}
	}
?>