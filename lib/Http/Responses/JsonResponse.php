<?php

namespace Lib\Http\Responses;

class JsonResponse extends \Zend\Diactoros\Response\JsonResponse{


    /**
     * @inheritdoc
     */
    public function __construct(
        $data,
        $status = 200,
        array $headers = [],
        $encodingOptions = self::DEFAULT_JSON_FLAGS){
        
        parent::__construct($data, $status, $headers, $encodingOptions);
    }
    
}