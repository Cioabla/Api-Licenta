<?php
/**
 * Created by PhpStorm.
 * User: mihai
 * Date: 1/22/2018
 * Time: 12:53 PM
 */

namespace App\Http\Controllers;

use App\HomeProduce;
use App\Post;
use App\Http\Controllers\Controller;
use App\Product;
use App\Subcategory;
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
        $i = 0;
        foreach ($produces as $produce)
        {
           $produce2 = Product::select('subcategory_id','name','model','price','qty','img')->find($produce['product_id']);
           $result[] = array_merge_recursive(array($produce2), array($produce));

        }


//        $produce2[] = Product::select('subcategory_id','name','model','price','qty')->find($produces[0]['product_id']);
//        $produce2[] = Product::select('subcategory_id','name','model','price','qty')->find($produces[0]['product_id']);
//        $produce2[] = $produces[0];
//        $produce2[] = array_merge_recursive(array($produce2[2]), array($produce2[1]));


//
//        for($i = 0 ; $i<5;$i++)
//        {
//            $v[] = $produce2[$i];
//        }
//
//        $a1=array("red","green");
//        $a2=array("blue","yellow");


        return response()->json($result);
    }
}