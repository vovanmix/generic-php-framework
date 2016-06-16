<?php

namespace Lib\Http\Responses;

class RedirectResponse extends \Zend\Diactoros\Response\RedirectResponse{

    /**
     * @inheritdoc
     */
    public function __construct($uri, $status = 302, array $headers = []){
        parent::__construct($uri, $status, $headers);
    }
}