<?php

namespace Lib\Database\Factories;

use Lib\Config\ConfigReader;
use Lib\Infrastructure\FactoryInterface;

abstract class PropelFactory implements FactoryInterface{

	public static function init(){

		$configReader = ConfigReader::getInstance();

		$db_conf = $configReader->getConfig('propel');

		$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
		$serviceContainer->checkVersion('2.0.0-dev');
		
		foreach($db_conf['propel']['runtime']['connections'] as $name){
			$connection = $db_conf['propel']['database']['connections'][$name];
			
			$serviceContainer->setAdapterClass($name, $connection['adapter']);
			$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
			$manager->setConfiguration(array (
				'classname' => 'Propel\\Runtime\\Connection\\DebugPDO',
				'dsn' => $connection['dsn'],
				'user' => $connection['user'],
				'password' => $connection['password'],
				'attributes' =>
					array (
						'ATTR_EMULATE_PREPARES' => false,
						'ATTR_TIMEOUT' => 30,
					),
				'model_paths' =>
					array (
						0 => 'src',
						1 => 'vendor',
					),
			));
			$manager->setName($name);
			$serviceContainer->setConnectionManager($name, $manager);
		}
		
		
		$serviceContainer->setDefaultDatasource($db_conf['propel']['runtime']['defaultConnection']);

		return $serviceContainer;
	}

}