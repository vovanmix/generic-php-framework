<?php

define('ROOT', __DIR__.'/..');
define('APP', ROOT.'/app');
define('CONFIG', ROOT.'/config');
define('PUBLIC', ROOT.'/public');
define('TMP', ROOT.'/tmp');
define('LOGS', TMP.'/logs');
define('CACHE', TMP.'/cache');

require_once ROOT . '/vendor/autoload.php';

require_once __DIR__.'/helpers.php';


$dotenv = new \Dotenv\Dotenv(ROOT);
$dotenv->load();


$container = getContainer();
$container->init();