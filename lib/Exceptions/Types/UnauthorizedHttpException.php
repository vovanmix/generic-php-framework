<?php

namespace Lib\Exceptions\Types;

use Lib\Http\ResponseHandler;

class UnauthorizedHttpException extends HttpException{
    
    public function getStatus()
    {
        return ResponseHandler::HTTP_UNAUTHORIZED;
    }
}