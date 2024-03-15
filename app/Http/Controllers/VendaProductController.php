<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsEntryRequest;
use App\Http\Requests\UpdateProductsEntryRequest;
use App\Models\ProductsEntry;
use Ramsey\Uuid\Uuid;


class VendaProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $params['name'] = "Histórico de vendas";         
        $productsEntries = ProductsEntry::with('product')->where('products_entries.action_code', '=', '2')->paginate(5);                  
        $params['productsEntries'] = $productsEntries;           
        return view('venda.lista', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(\Illuminate\Http\Request $request)
    {                
        $params['name'] = "Venda de produto";
        $params['productsEntry'] = new ProductsEntry();         
        return view('venda.cadastro', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductsEntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductsEntryRequest $request)
    {        
        $productEntry = new ProductsEntry();
        $productEntry->id = Uuid::uuid4();
        $productEntry->product_id = $request->input('product_id');
        $productEntry->data = $request->input('data');
        $productEntry->quantity = $request->input('quantity');       
        $productEntry->unity_price = $request->input('unity_price');  
        $productEntry->action_code = 2;
        $productEntry->save();
        return redirect()->route('vendaProducts.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductsEntry  $productsEntry
     * @return \Illuminate\Http\Response
     */
    public function show(ProductsEntry $productsEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductsEntry  $productsEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductsEntry $productsEntry)
    {       
        if(!$productsEntry){
            abort(404);
        }          
        $params['productsEntry'] = $productsEntry;        
        $params['name'] = "Editar venda de produto";
        return view('venda.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductsEntryRequest  $request
     * @param  \App\Models\ProductsEntry  $productsEntry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsEntryRequest $request, ProductsEntry $productsEntry)
    {
        $productsEntry->product_id = $request->input('product_id');
        $productsEntry->data = $request->input('data');
        $productsEntry->quantity = $request->input('quantity');
        $productsEntry->unity_price = $request->input('unity_price');
        $productsEntry->save();
        return redirect()->route('vendaProducts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductsEntry  $productsEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductsEntry $productsEntry)
    {
        if(!$productsEntry){
            abort(404);
        }  
        $productsEntry->delete();
        return redirect()->route('vendaProducts.index');
    }          
}
