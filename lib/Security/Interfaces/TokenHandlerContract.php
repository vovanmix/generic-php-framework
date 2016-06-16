<?php

namespace Lib\Security\Interfaces;

use Lib\Http\ServerRequest;

interface TokenHandlerContract{

    const DI = 'token';

    public function getCurrentUser();

    public function getAuthHeader(ServerRequest $request): string;

    public function decodeAuthHeader(string $auth_header): string;

    public function getUserFromToken(string $token);

    public function generateToken($user): string;

}