<?php
/**
 * Created by PhpStorm.
 * User: mihai
 * Date: 1/22/2018
 * Time: 12:53 PM
 */

namespace App\Http\Controllers;

use App\HomeProduce;
use App\Product;
use Illuminate\Http\Request;


class HomeProduceController extends Controller
{
    public function createPost(Request $request)
    {
        $post = HomeProduce::create($request->all());

        return response()->json($post);
    }

    public function updatePost(Request $request, $id)
    {

        $post = HomeProduce::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->views = $request->input('views');
        $post->save();

        return response()->json($post);
    }

    public function viewPost($id)
    {

        $post = HomeProduce::find($id);

        return response()->json($post);
    }

    public function index()
    {
        $produces = HomeProduce::all();
        $result = [];
        foreach ($produces as $produce)
        {
           $produce2 = Product::select('subcategory_id','name','model','price','qty','img')->find($produce->product_id);
           $produce2['location'] =  $produce['location'];

            $result = array_merge($result , array($produce2));

        }

        return response()->json($result);

    }
}