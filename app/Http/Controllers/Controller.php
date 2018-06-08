<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use \Firebase\JWT\JWT;
use App\User;

class Controller extends BaseController
{
    private $jwt_key;


    public function __construct()
    {
        $this->jwt_key = env('JWT_KEY');
    }

    public function setUserToken($data)
    {
        return JWT::encode(
                array(
                    "id" => $data[0]['id'],
                    "name" => $data[0]['name'],
                    "email" => $data[0]['email'],
                    "password" => $data[0]['password']
                ),$this->jwt_key);
    }

    public function checkIfNameIsValid($name)
    {
        try {
            User::where('name','=',$name)->firstOrFail();

            return true;
        } catch (\Exception $e){
            return false;
        }
    }

    public function checkIfEmailIsValid($email)
    {
        try {
            User::where('email','=',$email)->firstOrFail();

            return true;
        } catch (\Exception $e){
            return false;
        }
    }
}
