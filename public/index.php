<?php

define('ROOT_PATH', realpath(__DIR__ . '/..'));

// Include the composer autoloader
include ROOT_PATH.'/external/autoload.php';

$application = new Acme\Application();
$application->run();
