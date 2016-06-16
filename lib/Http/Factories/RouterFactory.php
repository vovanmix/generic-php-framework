<?php

namespace Lib\Http\Factories;

use Lib\Http\Router;
use Lib\Infrastructure\FactoryInterface;

class RouterFactory implements FactoryInterface {

	public static function init(): Router {
		$instance = Router::getInstance();
		$instance->init();
		return $instance;
	}
}