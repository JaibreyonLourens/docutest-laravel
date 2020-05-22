<?php

namespace App\Http\Controllers;

use \App\Product;
use \App\category;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);
        return view('products/index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products/create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name'          => 'required|max:50',
            'price'         => 'required|numeric',
            'categorie_id'  => 'required|exists:categories,id'
        ]);

        {
            Product::insert([
                'name'           => $request->name,
                'price'          => $request->price,
                'categories_id'  => $request->categorie_id
            ]);
        }


        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Product $product)
    {
        return view('products/show', ['product' => $product] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Product $product)
    {


        $categories = Category::all();

        return view('products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'categories_id' => $request->categorie_id
        ]);

        return redirect()->route('products.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
