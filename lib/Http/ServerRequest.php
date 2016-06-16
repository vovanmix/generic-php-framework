<?php

namespace Lib\Http;


class ServerRequest extends \Zend\Diactoros\ServerRequest {

    const DI = 'request';


    public function inputQuery($name, $default = null) {
        $params = $this->getQueryParams();
        if(isset($params[$name])){
            return ($params[$name]); // todo: sanitize / filter
        }
        return $default;
    }

    public function inputPost($name, $default = null){
        $params = $this->getParsedBody();
        if(isset($params[$name])){
            return ($params[$name]); // todo: sanitize / filter
        }
        return $default;
    }

}