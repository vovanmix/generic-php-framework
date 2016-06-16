<?php

namespace Lib\Infrastructure\Factories;

use Lib\Infrastructure\FactoryInterface;
use Lib\Infrastructure\FileLogger;
use Symfony\Component\Console\Output\StreamOutput;

class FileLoggerFactory implements FactoryInterface{
	
	const DI = 'logger';

	public static function init(): FileLogger {
		$datetime = new \DateTime();
		$log_filename = LOGS . '/' . $datetime->format('m-d').'.log';
		$output = new StreamOutput(fopen($log_filename, 'a', false));
		$logger = new FileLogger($output);
		return $logger;
	}
	
}