<?php

namespace Lib\Exceptions\Types;

use Lib\Http\ResponseHandler;

class AccessForbiddenHttpException extends HttpException{

    public function getStatus()
    {
        return ResponseHandler::HTTP_FORBIDDEN;
    }
}