<?php

namespace Lib\Http;

use App\Exceptions\ExceptionHandler;
use Lib\Exceptions\BaseExceptionHandler;
use Lib\Exceptions\Types\NotFoundHttpException;
use Lib\Infrastructure\BaseContainer;
use Lib\Infrastructure\LoggerContract;
use Lib\Infrastructure\SingletonTrait;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;
use Psr\Http\Message\RequestInterface;
use \Psr\Http\Message\ResponseInterface;

class Router {
    
    const DI = 'router';
    const ROUTE_WILDCARD = '[a-zA-Z0-9+_\-\.\/]*';
    const ROUTE_WILDCARD_MATCH = '{url:[a-zA-Z0-9+_\-\.\/]*}';
    
    use SingletonTrait;

    private $_router_data;

    public function init(){

        $router = new RouteCollector();
        
        include APP . '/Http/Routes/routes.php';

        $this->_router_data = $router->getData();//todo: cache it
    }

    /**
     * @return ResponseInterface
     */
    public function dispatch(): ResponseInterface{

        $dispatcher = new Dispatcher($this->_router_data);
        /** @var BaseContainer $container */
        $container = getContainer();

        /** @var RequestInterface $request */
        $request = $container->getRequest();
        $request_method = $request->getMethod(); //$_SERVER['REQUEST_METHOD'];
        $request_uri = $request->getUri(); //$_SERVER['REQUEST_URI'];

        try {
            /** @var ResponseInterface $response */
            $response = $dispatcher->dispatch($request_method, parse_url($request_uri, PHP_URL_PATH));
            
            if(empty($response)){
                throw new NotFoundHttpException();
            }

        } catch(\Exception $e){
            /** @var BaseExceptionHandler $handler */
            $handler = $container->di()->get(ExceptionHandler::DI);
            $response = $handler->handle($e);

            /** @var LoggerContract $logger */
            $logger = $container->di()->get(LoggerContract::DI);
            $logger->logException($e);
        }

        return $response;
    }

}