<?php
/**
 * Created by PhpStorm.
 * User: mihai
 * Date: 1/22/2018
 * Time: 12:53 PM
 */

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $post = Post::create($request->all());

        return response()->json($post);
    }

    public function updatePost(Request $request, $id)
    {

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->views = $request->input('views');
        $post->save();

        return response()->json($post);
    }

    public function viewPost($id)
    {

        $post = Post::find($id);

        return response()->json($post);
    }

    public function index()
    {
        $post = Post::all();

        return response()->json($post);
    }
}