<?php

namespace App\Http\Middleware;

use Lib\Exceptions\Types\UnauthorizedHttpException;
use Lib\Security\Interfaces\TokenHandlerContract;

class Auth {
    
    public function handle(){
        $di = getDI();
        /** @var TokenHandlerContract $token_service */
        $token_service = $di->get(TokenHandlerContract::DI);
        $user = $token_service->getCurrentUser();

        
        if(empty($user)){
            throw new UnauthorizedHttpException();
        }

    }
    
}