<?php

namespace Lib\Infrastructure;

class DependencyInjector{

    private $dependencies;
    private $registry;

    use SingletonTrait;

    
    /**
     * @return object
     * @param string | null $name
     */
    public function get($name){
        return $this->obtainClassInstance($name);
    }

    /**
     * @param string $name
     * @return object
     */
    private function obtainClassInstance(string $name){
        if (!isset($this->dependencies[$name])) {
            //todo: throw exception?
            /** @var FactoryInterface $factory */
            $factory = $this->registry[$name];
            $this->dependencies[$name] = $factory::init();
        }
        return $this->dependencies[$name];
    }

    /**
     * @param object $object
     * @param string | null $name
     */
    public function addInstance($object, string $name){
        $this->dependencies[$name] = $object; 
    }


    /**
     * @param string $factory_class like App\MyClass
     * @param string $name
     */
    public function register(string $factory_class, string $name){
        $this->registry[$name] = $factory_class;
    }

}