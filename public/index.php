<?php

include __DIR__ . '/../lib/bootstrap.php';

$response = $container->getRouter()->dispatch();

header("Access-Control-Allow-Origin: *");
\Lib\Http\ResponseHandler::serve($response);