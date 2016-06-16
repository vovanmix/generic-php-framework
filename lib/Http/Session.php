<?php

namespace Lib\Http;

use Lib\Infrastructure\SingletonTrait;

class Session {

    use SingletonTrait;


    public function init(){
        session_start();
    }
    
    
}