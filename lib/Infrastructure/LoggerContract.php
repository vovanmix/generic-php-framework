<?php

namespace Lib\Infrastructure;

use Psr\Log\LoggerInterface;

interface LoggerContract extends LoggerInterface{

	const DI = 'logger';
	
	public function logException(\Exception $e);

}