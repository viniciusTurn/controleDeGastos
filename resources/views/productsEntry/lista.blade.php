@extends("layouts.template")

@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <h4>Lista de entradas de produtos</h4>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped" id="tabelaProcedimentosDigitados">
                <thead>
                    <th class='col text-start'>Produto</th>
                    <th class='col text-start'>Data</th>
                    <th class='col text-start'>Quantidade</th> 
                    <th class='col text-start'>Preço unitário</th> 
                    <th class="col btsAcaoComTexto-2 text-center">Ação</th>
                </thead>
                <tbody>
                    @foreach($productsEntries as $item)
                        <tr>
                            <td class='text-start'>{{ $item->product->description }}</td>
                            <td class='text-start'>{{ \Carbon\Carbon::parse($item->data)->format('d/m/Y') }}</td>
                            <td class='text-start'>{{ $item->quantity }}</td>
                            <td class='text-start'>R$ {{ number_format($item->unity_price, 2, ',', '.') }}</td>                         
                            <td class='text-center'>
                                <a class="btn btn-primary" href="{{ route('productsEntry.edit', ['productsEntry' => $item->id]) }}">Editar</a>                                
                                <!-- Formulário para ação de exclusão -->
                                <form action="{{ route('productsEntry.destroy', ['productsEntry' => $item->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $productsEntries->links() }}
</div>
@endsection