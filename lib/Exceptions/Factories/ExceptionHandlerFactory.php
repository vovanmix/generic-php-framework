<?php

namespace Lib\Exceptions\Factories;

use App\Exceptions\ExceptionHandler;
use Lib\Infrastructure\FactoryInterface;

class ExceptionHandlerFactory implements FactoryInterface{

	public static function init(): ExceptionHandler {
		return ExceptionHandler::getInstance();
	}

}