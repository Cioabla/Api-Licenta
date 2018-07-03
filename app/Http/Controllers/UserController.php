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
use App\Role;



class UserController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function checkUsername($username,Request $request)
    {
        $this->findUser($username);

        if($this->userName != null)
        {
            return response()
                ->json(true)
                ->withCallback($request->input('callback'));
        }else{
            return response()
                ->json(false)
                ->withCallback($request->input('callback'));
        }
    }

    public function checkEmail($email,Request $request)
    {
        $this->findEmail($email);

        if($this->userEmail != null)
        {
            return response()
                ->json(true)
                ->withCallback($request->input('callback'));
        }else{
            return response()
                ->json(false)
                ->withCallback($request->input('callback'));
        }
    }

    public function login($usernameOrEmail)
    {
        $this->findUser($usernameOrEmail);

        if($this->userName != null)
        {
            return response()->json($this->setUserToken($this->userName));
        }

        $this->findEmail($usernameOrEmail);

        if ($this->userEmail != null)
        {
            return response()->json($this->setUserToken($this->userEmail));
        }else
        {
            return response()->json(['error' => 'The user or password is incorrect']);
        }

    }

    public function add(Request $request)
    {
        if (preg_match('/[^A-Za-z0-9 ]/', $request->name)) // '/[^a-z\d]/i' should also work.
        {

            $user['error']['name'] = 'Name must contain only letters and space';

        }else {
            if(strlen($request->name) <= 2)
            {
                $user['error']['name'] = 'Name must be greater than 2 letters';

            }else if(strlen($request->name) >= 30)
            {
                $user['error']['name'] = 'Name must be less than 30 letters';

            }

        }

//        return response()->json(var_dump(strpos('b', $request->email)));
        if(preg_match('/[^A-Za-z0-9.@_-]/', $request->email))
        {
            $user['error']['email'] = 'Email must contain only letters or numbers or _ or - or @';

        }else if(substr_count($request->email, '@') !=1){
            $user['error']['email'] = 'Email must contain one @';
        }else{

            if(strlen($request->email) <= 5)
            {
                $user['error']['email'] = 'Email must be greater than 5 letters';

            }else if(strlen($request->email) >= 100)
            {
                $user['error']['email'] = 'Email must be less than 100 letters';

            }else {
                $this->findEmail($request->email);
                if($this->userEmail != null)
                {
                    $user['error']['email'] = 'Email '.$request->email.' is taken';

                }
            }
        }

        if(preg_match('/[^A-Za-z0-9_-]/', $request->username))
        {
            $user['error']['username'] = 'Username must contain only letters or numbers or _ or -';

        }else {
            if(strlen($request->username) <= 5)
            {
                $user['error']['username'] = 'Username must be greater than 5 letters';

            }else if(strlen($request->username) >= 15)
            {
                $user['error']['username'] = 'Username must be less than 15 letters';

            }else {
                $this->findUser($request->username);
                if($this->userName != null)
                {
                    $user['error']['username'] = 'Username '.$request->username.' is taken';

                }
            }
        }

        if(strlen($request->password) <= 7)
        {
            $user['error']['password'] = 'Password must be greater than 7 letters';

        }else if(strlen($request->password) >= 20)
        {
            $user['error']['password'] = 'Password must be less than 20 letters';

        }

        if(!empty($user['error']))
        {
           return response()->json($user);

        }else{

            $user = User::create($this->addUserRole($request->all()));


            return response()->json($this->setUserToken($user));

        }


//        if($this->checkIfNameIsValid($request->username))
//        {
//            return response()->json([
//                'usernametaken' =>'Username is already taken'
//            ]);
//        }
//
//        if($this->checkIfEmailIsValid($request->email))
//        {
//            return response()->json([
//                'emailtaken' =>'Email is already taken'
//            ]);
//        }
//
//        $user = User::create($request->all());
////        return response()->json($request->header());
//
//
//        return response()->json($this->setUserToken($user));
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