<?php

namespace Lib\Exceptions\Types;

class ValidationException extends UnprocessableEntityHttpException{

    protected $errors = [];

    public function getErrors(){
        return $this->errors;
    }

    public function setErrors(array $errors){
        $this->errors = $errors;
    }

    public function setError(string $field, string $message){
        $this->errors[$field] = $message;
    }

}