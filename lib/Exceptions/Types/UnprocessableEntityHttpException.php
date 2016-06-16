<?php

namespace Lib\Exceptions\Types;

use Lib\Http\ResponseHandler;

class UnprocessableEntityHttpException extends HttpException {

    public function getStatus()
    {
        return ResponseHandler::HTTP_UNPROCESSABLE_ENTITY;
    }
    
}