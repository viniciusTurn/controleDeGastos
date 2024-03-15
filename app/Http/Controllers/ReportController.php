<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsEntry;

class ReportController extends Controller
{
    public function relatorioGastos()
    {        
        $params['name'] = "Relatório de gastos";                                             
        return view('report.principal', $params);
    }
    
     public function gerarGraficos(Request $request)
    {       
        // Obtenha os dados para o gráfico, se necessário
        $dados = $request->all();        

        // Gere o HTML do gráfico de barras
       // $htmlGrafico = GraficoService::gerarHTMLGrafico($dados);
        
        $totalCompras = ProductsEntry::selectRaw('SUM(unity_price * quantity) AS total')
                ->where('products_entries.action_code', '1')
                ->whereMonth('data', $dados['mes'])
                ->whereYear('data', $dados['ano'])
                ->first();
        $totalVendas = ProductsEntry::selectRaw('SUM(unity_price * quantity) AS total')
                ->where('products_entries.action_code', '2')
                ->whereMonth('data', $dados['mes'])
                ->whereYear('data', $dados['ano'])
                ->first();
        
        $totalCompras = $totalCompras->total ?? 0;
        $totalVendas = $totalVendas->total ?? 0; 
        
        $retorno = [
            'totalCompras' => $totalCompras,
            'totalVendas' => $totalVendas,
            'totalDiferenca' => $totalVendas - $totalCompras
        ];        
        
        return response()->json($retorno);
    }
}
