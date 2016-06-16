<?php

namespace Lib\Exceptions\Types;

abstract class HttpException extends \Exception{

    abstract public function getStatus();
    
}