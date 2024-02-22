<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(){
        return view('products/cart');
    }

    public function listCarts(){
        $products = Product::get();

        return ProductResource::collection($products);
    }

    public function remove($id){
        $etudiant = Product::find($id);

        $etudiant->delete();

        return response()->json('successfully deleted');

    }
}
