<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use \Firebase\JWT\JWT;
use App\User;
use App\Role;

class Controller extends BaseController
{
    private $jwt_key;
    protected $userName;
    protected $userEmail;


    public function __construct()
    {
        $this->jwt_key = env('JWT_KEY');
    }

    public function addUserRole($vector)
    {
        return array_merge($vector , ['role_id' => (Role::findRoleByName('user'))->id]);
    }

    public function setUserToken($data)
    {
        return JWT::encode(
                array(
                    "id" => $data->id,
                    "name" => $data->name,
                    "username" => $data->username,
                    "email" => $data->email,
                    "password" => $data->password
                ),$this->jwt_key);
    }

    public function findUser($username)
    {
        try {
            $this->userName = User::where('username','=',$username)->firstOrFail();

        } catch (\Exception $e){

            $this->userName = null;
        }
    }

    public function findEmail($email)
    {
        try {
            $this->userEmail = User::where('email','=',$email)->firstOrFail();

        } catch (\Exception $e){

            $this->userEmail = null;
        }
    }

//    public function checkIfNameIsValid($name)
//    {
//        try {
//            User::where('name','=',$name)->firstOrFail();
//
//            return true;
//        } catch (\Exception $e){
//            return false;
//        }
//    }
//
//    public function checkIfEmailIsValid($email)
//    {
//        try {
//            User::where('email','=',$email)->firstOrFail();
//
//            return true;
//        } catch (\Exception $e){
//            return false;
//        }
//    }
}
