<?php
/**
 * Created by PhpStorm.
 * User: mihai
 * Date: 2/7/2018
 * Time: 9:21 PM
 */

namespace App\Http\Controllers;


use App\Product;
use App\Subcategory;

class ProductController
{
    public function index($name , $page)
    {
        $name = str_replace('%20',' ',$name);
        $offset = $page * 12 -12;
        $subcategory = Subcategory::findSubcategoyByName($name);
        $products = Product::findSubcategoryProducts($subcategory[0]['id'] , $offset);

        return response()->json($products);
    }

    public function length($name)
    {
        $name = str_replace('%20',' ',$name);
        $subcategory = Subcategory::findSubcategoyByName($name);

        return response()->json(Product::length($subcategory[0]['id']));
    }

    public function oneProduct($name)
    {
        $name = str_replace('%20',' ',$name);
        $product = Product::product($name);

        return response()->json($product);
    }
}