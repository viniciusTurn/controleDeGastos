<?php

namespace App\Http\Controllers;

use App\Models\venda;
use Illuminate\Http\Request;

class VendaProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params['name'] = "Produtos vendidos";
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
        $params['name'] = "Vender produto";              
        return view('venda', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function show(venda $venda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function edit(venda $venda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, venda $venda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function destroy(venda $venda)
    {
        //
    }
}
