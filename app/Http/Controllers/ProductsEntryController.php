<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsEntryRequest;
use App\Http\Requests\UpdateProductsEntryRequest;
use App\Models\ProductsEntry;
use Ramsey\Uuid\Uuid;

class ProductsEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \DB::enableQueryLog();

        $params['name'] = "Histórico de compras";         
        $productsEntries = ProductsEntry::with('product')->paginate(5);                   
        $params['productsEntries'] = $productsEntries;           
        return view('productsEntry.lista', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $params['name'] = "Entrada de produto";
        $params['productsEntry'] = new ProductsEntry();         
        return view('productsEntry.cadastro', $params);
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
        $productEntry->quantity = $request->input('quantity');       
        $productEntry->unity_price = $request->input('unity_price');  
        $productEntry->action_code = 1;
        $productEntry->save();  
        return redirect()->to('/compra/cadastro/');
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
        $params['name'] = "Editar entrada de produto";
        return view('productsEntry.edit', $params);
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
        $productsEntry->quantity = $request->input('quantity');
        $productsEntry->unity_price = $request->input('unity_price');
        $productsEntry->save();
        return redirect()->route('productsEntry.index');
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
        return redirect()->route('productsEntry.index');
    }
}
