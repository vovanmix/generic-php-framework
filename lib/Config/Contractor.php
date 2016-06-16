<?php

namespace Lib\Config;

use Lib\Infrastructure\SingletonTrait;

class Contractor{

    const DI = 'contractor';
    
    use SingletonTrait;


    /**
     * @param string $name
     * @return string mixed
     */
    public function getContractClassName($name){
        return \Lib\Config\ConfigReader::getInstance()->getAppConfig()['contracts'][$name];
    }

}