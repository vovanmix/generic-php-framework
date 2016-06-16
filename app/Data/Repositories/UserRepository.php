<?php

namespace App\Data\Repositories;

use App\Data\Models\User;
use DatabaseMeta\UserQuery;

class UserRepository extends UserQuery{


    /**
     * @param string $name
     * @return User|null
     */
    public static function getByUsername(string $name) {
        /** @var User $result */
        $result = self::create()->filterByName($name)->findOne();
        if(empty($result)){
            return NULL;
        }
        else{
            return $result;
        }
        
    }
    
    /**
     * @param string $id
     * @return User|null
     */
    public static function getById(string $id) {
        /** @var User $result */
        $result = self::create()->filterById($id)->findOne();
        if(empty($result)){
            return NULL;
        }
        else{
            return $result;
        }

    }

}