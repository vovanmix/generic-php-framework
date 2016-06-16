<?php

namespace Lib\Database;

use Lib\Config\ConfigReader;
use Lib\Infrastructure\FactoryInterface;

abstract class LazyRecordDatabaseFactory implements FactoryInterface{

    public static function init(){

        $configReader = ConfigReader::getInstance();
        
        $db_conf = $configReader->getDatabaseConfig();
        
        $db_config_loader = new \LazyRecord\ConfigLoader;
        $db_config_loader->load($db_conf);
        $db_config_loader->init();
    }

}