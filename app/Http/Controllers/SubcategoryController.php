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
use App\Subcategory;
use Illuminate\Http\Request;


class SubcategoryController extends Controller
{
    public function createPost(Request $request)
    {
        $post = Subcategory::create($request->all());

        return response()->json($post);
    }

    public function updatePost(Request $request, $id)
    {

        $post = Subcategory::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->views = $request->input('views');
        $post->save();

        return response()->json($post);
    }

    public function viewPost($id)
    {

        $post = Subcategory::find($id);

        return response()->json($post);
    }

    public function index()
    {
        $post = Subcategory::all();

        return response()->json($post);
    }
}