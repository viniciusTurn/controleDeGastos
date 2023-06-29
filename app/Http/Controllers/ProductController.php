<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params['name'] = "produtos";
        $products = Product::paginate(5);       
        $params['produtos'] = $products;
        return view('lista', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params['name'] = "Cadastrar novo produto";
        $params['produto'] = new Product();         
        return view('cadastro', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $produto = new Product();
        $produto->NOME = $request->input('descricao');
        $produto->QUANTIDADE_EM_ESTOQUE = $request->input('quantidade');
        $produto->PRECO_UNITARIO = $request->input('preco');
        $produto->save();  
        return redirect()->to('/products/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {        
        if(!$product){
            abort(404);
        }        
        $params['produto'] = $product;        
        $params['name'] = "Editar produto";
        return view('cadastro', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(!$product){
            abort(404);
        }  
        $product->delete();
        return redirect()->route('products.index');
    }
    
    public function listar()
    {
        $products = Product::all();
        $params['name'] = "produtos";
        $params['produtos'] = $products;
        return view('lista', $params); 
    }
}
