<?php

namespace Lib\Http\Responses;

class EmptyResponse extends \Zend\Diactoros\Response\EmptyResponse{

    /**
     * @inheritdoc
     */
    public function __construct($status = 204, array $headers = []){
        parent::__construct($status, $headers);
    }
}