<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // returning products page and displaying all products
    public function index(){
        $products = Product::all();
        return view('products.index', ['prod' => $products]);
        
    }

    // returning the create products html
    public function create(){
        return view('products.create');
    }

    // Inserting data to the database
    // Requesting data from the form and validate
    public function store(Request $request){
       $data = $request->validate([
        'name' => 'required',
        'qty' => 'required|numeric',
        'price' => 'required|decimal:0,2',
        'description' => 'nullable',
       ]);

       $newProduct = Product::create($data);

       return redirect(route('product.index'));
    }

    // going to edit page html passing the ID of certain product
    // via Route to controller to View
    public function edit(Product $product){
        return view('products.edit',['prod'=>$product]);
    }

    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable',
           ]);

           $product->update($data);

           return redirect(route('product.index'))->with('success', 'Product Updated Succesfully'); 
    }

    public function destroy(Product $product){
        $product->delete();

        return redirect(route('product.index'))->with('success', 'Product Deleted Succesfully');
    }


}
