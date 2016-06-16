<?php

namespace App\Security;

use App\Data\Models\User;
use App\Data\Repositories\UserRepository;
use Lib\Http\ServerRequest;
use Lib\Security\Interfaces\TokenHandlerContract;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;

class TokenHandler implements TokenHandlerContract{

    const HEADER = 'Authorization';
    const PREFIX = 'Bearer ';
    
    /**
     * @return User|null
     */
    public function getCurrentUser()
    {
        $di = getDI();
        $request = $di->get(ServerRequest::DI);
        $token = $this->decodeAuthHeader($request);
        if(!empty($token)){
            return $this->getUserFromToken($token);
        }
        return NULL;
    }

    /**
     * @param ServerRequest $request
     * @return string
     */
    public function getAuthHeader(ServerRequest $request): string
    {
        $auth_header = $request->getHeader(self::HEADER);
        if(!empty($auth_header)){
            $token = $this->decodeAuthHeader($auth_header);
            return $token;
        }
        return NULL;
    }

    /**
     * @param string $auth_header
     * @return string
     */
    public function decodeAuthHeader(string $auth_header): string
    {
        $prefix = self::PREFIX;
        $len = strlen($prefix);
        if(substr($auth_header, 0, $len) == $prefix){
            $token = substr($auth_header, $len);
            return $token;
        }
        return NULL;
    }

    /**
     * @param string $token
     * @return User | null
     */
    public function getUserFromToken(string $token)
    {
        /** @var \Lcobucci\JWT\Token $token */
        $token = (new Parser())->parse((string) $token);
        $user_id = $token->getClaim('uid');
        $user = UserRepository::getById($user_id);
        return $user;
    }

    /**
     * @param User $user
     * @return string
     */
    public function generateToken($user): string
    {
        $token_id = uniqid();

        $token = (new Builder())
            ->setId($token_id, true)
            ->setIssuedAt(time())
            ->setNotBefore(time() + 60) // Configures the time that the token can be used (nbf claim)
            ->setExpiration(time() + 3600) // Configures the expiration time of the token (nbf claim)
            ->set('uid', $user->getId()) // Configures a new claim, called "uid"
            ->getToken(); // Retrieves the generated token

        return $token;
    }

}