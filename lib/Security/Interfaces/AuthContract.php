<?php

namespace Lib\Security\Interfaces;

interface AuthContract{

    const DI = 'auth';

    public function authenticate($username, $password);

    public static function encodePassword(string $password): string;
    
}