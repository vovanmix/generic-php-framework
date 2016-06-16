<?php

namespace App\Http\Controllers\Admin;

use Lib\Exceptions\Types\UnprocessableEntityHttpException;
use Lib\Http\Controller;
use Lib\Http\Responses\JsonResponse;
use Lib\Security\Interfaces\AuthContract;
use Lib\Security\Interfaces\TokenHandlerContract;

class LoginController extends Controller{

    public function login(){
        $username = $this->getRequest()->inputPost('username');
        $password = $this->getRequest()->inputPost('password');

        /** @var AuthContract $auth */
        $auth = $this->get(AuthContract::DI); 
        
        if($user = $auth->authenticate($username, $password)){            
            /** @var TokenHandlerContract $token_service */
            $token_service = $this->get(TokenHandlerContract::DI);
            
            $token = $token_service->generateToken($user);
            return new JsonResponse(['success' => true, 'id_token' => $token]);
        }
        else{
            throw new UnprocessableEntityHttpException('login incorrect');
        }
        
    }

}