<?php

namespace Lib\Exceptions;

use Lib\Exceptions\Types\HttpException;
use Lib\Exceptions\Types\ValidationException;
use Lib\Http\Responses\EmptyResponse;
use Lib\Http\Responses\JsonResponse;
use Lib\Http\ResponseHandler;
use Lib\Infrastructure\SingletonTrait;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Psr\Http\Message\ResponseInterface;

abstract class BaseExceptionHandler {
    
    const DI = 'exception_handler';
    
    use SingletonTrait;
    
    protected function getHandlers(): array{
        return [
            HttpRouteNotFoundException::class => 'handleNotFoundException',
            ValidationException::class =>'handleValidationException',
        ];
    }

    /**
     * @param \Exception $e
     * @return ResponseInterface
     */
    public function handle(\Exception $e): ResponseInterface{

        $exception_class = get_class($e);

        $handlers = $this->getHandlers();
        if(isset($handlers[$exception_class])){
            return $this->{$handlers[$exception_class]}($e);
        }
        
        if($e instanceof HttpException){
            return $this->handleDefaultHttpException($e);
        }

        return new EmptyResponse(ResponseHandler::HTTP_INTERNAL_SERVER_ERROR);

    }
    
    ### --- Handlers --- ###
    //todo: move handlers somewhere else?
    
    protected function handleDefaultHttpException(HttpException $e): ResponseInterface{
        return new JsonResponse([
            'success' => false,
            'message' => $e->getMessage()
        ], $e->getStatus());
    }

    
    protected function handleValidationException(ValidationException $e): ResponseInterface{
        return new JsonResponse([
            'success' => false,
            'message' => $e->getMessage(),
            'errors' => $e->getErrors()
        ], $e->getStatus());
    }
    

    protected function handleNotFoundException(\Exception $e): ResponseInterface{
        return new JsonResponse([
            'success' => false,
            'message' => 'page not found'
        ], ResponseHandler::HTTP_NOT_FOUND);
    }
    
    
}