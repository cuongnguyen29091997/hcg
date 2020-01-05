<?php
session_start();
$routes = [
	"account" => [
		'login' => [],
		'logout' => [],
		'checklogin' => [],
	],
	"benh" => [
		'index' => ['fake-data','page'],
		'create' => [],
		'edit' => ['id'],
		'update' => ['id'],
		'delete' => ['id'],
		'store' => [],
	],
	"tinh-trang" => [
		'index' => ['fake-data','page'],
		'create' => [],
		'edit' => ['id'],
		'update' => ['id'],
		'delete' => ['id'],
		'store' => []
	],
	"benh-tinh-trang" => [
		'index' => ['fake-data','page'],
		'create' => [],
		'edit' => ['id'],
		'update' => ['id'],
		'delete' => ['id'],
		'store' => []
	],
];

$controller = $parameters[0];


if(!isset($parameters[1]) || !isset($routes[$controller][$parameters[1]])) {
	header("Location: /cms-admin/account/login");
	die();
}

$action = $parameters[1];
if($controller !== 'account' && ($action !== 'login' || $action != "checklogin")) {
	if(!isset($_SESSION['username']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
		header("Location: /cms-admin/account/login");
		die();
	}
} else {
	if(isset($_SESSION['username']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin')
		header("Location: /cms-admin/benh/index");
}

$parameterPoint = 1;
foreach ($routes[$controller][$action] as $parameter) {
	$_GET[$parameter] = isset($parameters[++$parameterPoint]) ? $parameters[$parameterPoint] : NULL;
}

$arrController = explode("-", $controller); 
$arrAction = explode("-", $action);
$action = "";$controller = "";

foreach ($arrAction as $child) $action .= ucwords($child);
foreach ($arrController as $child) $controller .= ucwords($child);

$controller = ucwords($controller).'Controller';
require_once('controllers/admin/' . $controller . '.php');
$class = new $controller;
$class->$action();
?>