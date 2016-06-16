<?php

namespace Lib\Config\Factories;

use Lib\Config\Contractor;
use Lib\Infrastructure\FactoryInterface;

class ContractorFactory implements FactoryInterface{
	
	public static function init(): Contractor {
		return Contractor::getInstance();
	}

}