<?php

namespace Lib\Exceptions\Types;

use Lib\Http\ResponseHandler;

class NotFoundHttpException extends HttpException{
    
    public function getStatus()
    {
        return ResponseHandler::HTTP_NOT_FOUND;
    }
}