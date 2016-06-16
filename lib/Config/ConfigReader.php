<?php

namespace Lib\Config;

use Lib\Infrastructure\SingletonTrait;

class ConfigReader{
    
    use SingletonTrait;

    protected $config = [];


    /**
     * @param string $file_key
     * @return array
     */
    protected static function readConfigFile($file_key){
        return include CONFIG . '/' . $file_key . '.php';
    }

    /**
     * @param string $key
     * @return array
     */
    public function getConfig($key){
        if(!isset($this->config[$key])) {
            $this->config[$key] = static::readConfigFile($key);
        }
        return $this->config[$key];
    }
    
    /**
     * @return array
     */
    public function getAppConfig(){
        return $this->getConfig('app');
    }
    
    

}