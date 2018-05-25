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


class UserController extends Controller
{
    public function add(Request $request)
    {

//        array_push($request[0],str_random(60));
        $request['api_token'] =  str_random(60);



//        return response()->json($toCreate);
        $user = User::create($request->all());
        return response()->json($user);
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