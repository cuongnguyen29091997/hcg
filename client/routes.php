<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$routes = [
	"home" => [
		"index" => [],
	],
	"benh" => [
		"show" => ['alias'],
	],
];
if(!isset($parameters[0]) || !isset($routes[$parameters[0]])) {
	header("Location: /home");
	die();
}

$controller = $parameters[0];
if(!isset($parameters[1]) || !isset($routes[$controller][$parameters[1]])) {
	$action = 'index';
} else $action = $parameters[1];

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
require_once('controllers/client/' . $controller . '.php');
$class = new $controller;
$class->$action();
?>