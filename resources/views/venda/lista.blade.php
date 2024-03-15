@extends("layouts.template")

@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <h4>{{ $name }}</h4>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped">
                <thead>
                    <th class='col text-start'>Produto</th>
                    <th class='col text-start'>Data</th>
                    <th class='col text-end'>Quantidade comprada</th>
                    <th class='col text-end'>Preço unitário</th>
                    <th class='col text-end'>Total</th>
                    <th class="col btsAcao-2 text-center">Ação</th>
                </thead>
                <tbody>
                    @foreach($productsEntries as $item)
                        <tr>
                            <td class='text-start'>{{ $item->product->description }}</td>
                            <td class='text-start'>{{ \Carbon\Carbon::parse($item->data)->format('d/m/Y') }}</td>
                            <td class='text-end'>{{ $item->quantity }}</td>
                            <td class='text-end'>R$ {{ number_format($item->unity_price, 2, ',', '.') }}</td>
                            <td class='text-end'>R$ {{ number_format($item->quantity * $item->unity_price, 2, ',', '.')  }}</td>
                            <td class='text-center'>
                                <a class="btn btn-primary" href="{{ route('vendaProducts.edit', ['productsEntry' => $item->id]) }}">Editar</a>                                
                                <!-- Formulário para ação de exclusão -->
                                <form action="{{ route('vendaProducts.destroy', ['productsEntry' => $item->id]) }}" method="POST" style="display:inline;">
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