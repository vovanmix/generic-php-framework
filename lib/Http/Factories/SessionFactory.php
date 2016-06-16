<?php

namespace Lib\Http\Factories;

use Lib\Http\Session;
use Lib\Infrastructure\FactoryInterface;

class SessionFactory implements FactoryInterface {

	public static function init(): Session {
		$instance = Session::getInstance();
		$instance->init();
		return $instance;
	}
}