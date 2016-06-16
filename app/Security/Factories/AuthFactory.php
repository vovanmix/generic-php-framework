<?php

namespace App\Security\Factories;

use App\Security\Auth;
use Lib\Infrastructure\DependencyInjector;
use Lib\Infrastructure\FactoryInterface;

class AuthFactory implements FactoryInterface{

    public static function init(): Auth{
//        $di = getDI();
        $auth = new Auth(); //$di);
        return $auth;
    }

}