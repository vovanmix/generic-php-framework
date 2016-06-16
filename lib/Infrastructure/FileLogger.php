<?php

namespace Lib\Infrastructure;

use Symfony\Component\Console\Logger\ConsoleLogger;

class FileLogger extends ConsoleLogger implements LoggerContract{
	
	public function logException(\Exception $e)
	{
		$this->error(
			(new \DateTime())->format('Y-m-d H:i:s'). ' ' .
			$e->getMessage() . "\r\n" . 
			$e->getFile() . "\r\n" . 
			$e->getLine() . "\r\n" . 
			$e->getTraceAsString());
	}

}