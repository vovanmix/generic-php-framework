<?php

namespace App\Security\Factories;

use App\Security\TokenHandler;
use Lib\Infrastructure\FactoryInterface;

class TokenHandlerFactory implements FactoryInterface{

    public static function init(): TokenHandler{
        return new TokenHandler();
    }

}