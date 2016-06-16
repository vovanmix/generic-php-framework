<?php

namespace App\Infrastructure;

use App\Security\Factories\AuthFactory;
use App\Security\Factories\TokenHandlerFactory;
use Lib\Database\DatabaseContract;
use Lib\Database\Factories\PropelFactory;
use Lib\Infrastructure\BaseContainer;
use Lib\Infrastructure\Factories\FileLoggerFactory;
use Lib\Infrastructure\LoggerContract;
use Lib\Security\Interfaces\AuthContract;
use Lib\Security\Interfaces\TokenHandlerContract;
use Lib\Views\Factories\PhpFactory;
use Lib\Views\ViewContract;

class Container extends BaseContainer{

    protected $language = 'en';
    
    protected function initCustomDependencies(){

        $this->di()->register(FileLoggerFactory::class, LoggerContract::DI);
        $this->di()->register(PhpFactory::class, ViewContract::DI);

        $propel = PropelFactory::init();
        $this->di()->addInstance($propel, DatabaseContract::DI);
        
        $this->di()->register(AuthFactory::class, AuthContract::DI);
        $this->di()->register(TokenHandlerFactory::class, TokenHandlerContract::DI);
    }
    
}