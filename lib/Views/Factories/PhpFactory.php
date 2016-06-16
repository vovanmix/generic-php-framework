<?php

namespace Lib\Views\Factories;

use Lib\Infrastructure\FactoryInterface;
use Lib\Views\PhpView;

class PhpFactory implements FactoryInterface{

	public static function init(): PhpView{
		return new PhpView();
	}

}