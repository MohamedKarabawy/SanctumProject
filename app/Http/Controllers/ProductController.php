<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        return Product::all();
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        return Product::create($request->all());
    }


    public function show($id)
    {
        return Product::find($id);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
       
        if(!$product)
        $response = [
            'message' => 'Product not found.'
        ];
         else {
        $product->update($request->all());
        $response = [
            'message' => 'Product has been updated.'
        ];
        }

        return response($response, 200);
    }

    /* search for a name */
    public function search($name)
    {
        $product = Product::where('name','like','%'.$name.'%');

        if(!$product->first())
        {
        $response = [
            'message' => 'Product not found.'
        ];

        return response($response, 200);
        }

        return $product->get();
    }

    public function destroy($id)
    {

      $product = Product::destroy($id);

        if(!$product)
        $response = [
            'message' => 'Product not found.'
        ];
         else 
        $response = [
            'message' => 'Product has been deleted.'
        ];


        return response($response, 200);
    }
}
