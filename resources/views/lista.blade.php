@extends("layouts.template")

@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <h4>Lista de produtos cadastrados</h4>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped" id="tabelaProcedimentosDigitados">
                <thead>
                    <th class='col text-start'>Produto</th>
                    <th class='col text-end'>Quantidade em estoque</th>
                    <th class='col text-end'>Preço unitário</th>
                    <th class="col btsAcao-2 text-center">Ação</th>
                </thead>
                <tbody>
                    @foreach($produtos as $item)
                        <tr>
                            <td class='text-start'>{{ $item->NOME }}</td>
                            <td class='text-end'>{{ $item->QUANTIDADE_EM_ESTOQUE }}</td>
                            <td class='text-end'>{{ $item->PRECO_UNITARIO }}</td>
                            <td class='text-center'>
                                <a class="btn btn-primary" href="{{ route('products.edit', ['product' => $item->id]) }}">Editar</a>
                                <a class="btn btn-danger" href="{{ route('products.destroy', ['product' => $item->id]) }}">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $produtos->links() }}
</div>
@endsection