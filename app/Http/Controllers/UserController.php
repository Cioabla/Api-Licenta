<?php
/**
 * Created by PhpStorm.
 * User: mihai
 * Date: 1/22/2018
 * Time: 3:00 PM
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use \Firebase\JWT\JWT;


class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($name)
    {
        $user = User::findUser($name);

        return response()->json($this->setUserToken($user));
    }

    public function add(Request $request)
    {

        if($this->checkIfNameIsValid($request->name))
        {
            return response()->json([
                'nametaken' =>'Name is already taken'
            ]);
        }

        if($this->checkIfEmailIsValid($request->email))
        {
            return response()->json([
                'emailtaken' =>'Email is already taken'
            ]);
        }

        $request['api_token'] =  str_random(60);

        $user = User::create($request->all());
//        return response()->json($request->header());
        return response()->json($this->setUserToken($user));
    }

    public function edit(Request $request , $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        return response()->json($user);
    }

    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }
}