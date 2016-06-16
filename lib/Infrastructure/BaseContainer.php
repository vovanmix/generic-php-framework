<?php

namespace Lib\Infrastructure;

use App\Exceptions\ExceptionHandler;
use Lib\Config\Contractor;
use Lib\Config\Factories\ContractorFactory;
use Lib\Exceptions\Factories\ExceptionHandlerFactory;
use Lib\Http\Factories\RequestFactory;
use Lib\Http\Factories\RouterFactory;
use Lib\Http\Router;
use Lib\Http\ServerRequest;

abstract class BaseContainer {
    
    use SingletonTrait;
    
    protected $language = 'en';

    /**
     * @var DependencyInjector
     */
    private $dependencyInjector;

    public function init(){
        $this->dependencyInjector = DependencyInjector::getInstance();

        $this->initDefaultDependencies();
        $this->initCustomDependencies();

    }
    
    private function initDefaultDependencies(){
        $this->dependencyInjector->register(ContractorFactory::class, Contractor::DI);
        
        $this->dependencyInjector->register(ExceptionHandlerFactory::class, ExceptionHandler::DI);

        $this->dependencyInjector->register(RequestFactory::class, ServerRequest::DI);

        $this->dependencyInjector->register(RouterFactory::class, Router::DI);
    }

    abstract protected function initCustomDependencies();
//    {

//        $session = $this->dependencyInjector->register(SessionFactory::class, 'session');

//        $db_factory_class = \Lib\Config\Contractor::getInstance()->getContractClassName(DatabaseInterface::class);
//        $this->dependencyInjector->register($db_factory_class, DatabaseContract::DI);

//    }

    /**
     * @return DependencyInjector
     */
    public function di(): DependencyInjector{
        return $this->dependencyInjector;
    }

    /**
     * @return ServerRequest
     */
    public function getRequest(): ServerRequest{
        return $this->dependencyInjector->get(ServerRequest::DI);
    }

    /**
     * @return Router
     */
    public function getRouter(): Router{
        return $this->dependencyInjector->get(Router::DI);
    }
    
    public function getLanguage(): string{
        return $this->language;
    }

}