<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../vendor/peej/tonic/src/Tonic/Autoloader.php';

$config = array(
    'load' => array('resources/*.php')
);

$app = new Tonic\Application($config);
$request = new Tonic\Request();

$resource = $app->getResource($request);
$response = $resource->exec();
$response->output();