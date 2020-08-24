<?php 
$path = ltrim($_SERVER['REQUEST_URI'], '/');
$path = str_replace("//", "/", $path);
$parameters = explode('/', $path);
$appFolders = ['cms-admin' => 'admin'];
$rootRoute = false;

if(array_key_exists($parameters[0],$appFolders)) $rootRoute = $appFolders[array_shift($parameters)];
// Get parameters

$folderRequired = ($rootRoute ? $rootRoute :  "client") . "/routes.php"; // default
require $folderRequired;
?>asdasdawd