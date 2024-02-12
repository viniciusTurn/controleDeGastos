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
        return view('products.lista', $params);
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
        return view('products.cadastro', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->description = $request->input('description');       
        $product->save();  
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
        return view('products.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request     
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {                     
        $product->description = $request->input('description');        
        $product->save();
        return redirect()->route('products.index');
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
    
    public function listar(\Illuminate\Http\Request $request)
    {      
        $produtos = \DB::table('products')                
                ->select('products.id', 'products.description')                
                ->where('products.description', 'like', "%" . $request->parametro . '%') 
                ->paginate(50);
        
        return $produtos;         
    }
    
//    public function listarOutroJeito(\Illuminate\Http\Request $request)
//    {      
//        $perPage = 3; // Número de itens por página, ajuste conforme necessário
//        $pageNumber = $request->page ?? 1; // Obtém o número da página do request, padrão é 1
//
//        $produtos = \DB::table('products')                
//                ->select('products.id', 'products.description')                                
//                ->where('products.description', 'like', "%" . $request->parametro . '%') 
//                ->skip(($pageNumber - 1) * $perPage)
//                ->take($perPage)
//                ->get();
//        return response()->json(['listaProdutos' => $produtos]);                          
//    }
    
}
