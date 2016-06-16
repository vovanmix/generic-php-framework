<?php

namespace Lib\Http\Responses;

/**
 * Class HtmlResponse
 * @package Lib\Http
 * @inheritdoc
 */
class HtmlResponse extends \Zend\Diactoros\Response\HtmlResponse{
    
    /**
    * @inheritdoc
    */
    public function __construct($html, $status = 200, array $headers = []){
        parent::__construct($html, $status, $headers);
    }
}