<?php

namespace App\Security;

use App\Data\Repositories\UserRepository;
use Lib\Security\Interfaces\AuthContract;

class Auth implements AuthContract{
    
//    /** @var DependencyInjector  */
//    private $di;
//    
//    public function __construct(DependencyInjector $di)
//    {
//        $this->di = $di;
//    }

    public function authenticate($username, $password)
    {
        $user = UserRepository::getByUsername($username);
        if(empty($user)){
            return NULL;
        }
        $encoded_password = self::encodePassword($password);
        if($user->getPassword() == $encoded_password){
            return $user;
        }
        return NULL;
    }
    
    public static function encodePassword(string $password): string{
        $salt = getenv('SALT');
        return crypt($password, $salt);
    }

}