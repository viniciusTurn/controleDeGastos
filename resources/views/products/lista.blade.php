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
                    <th class="col btsAcaoComTexto-2 text-center">Ação</th>
                </thead>
                <tbody>
                    @foreach($produtos as $item)
                        <tr>
                            <td class='text-start'>{{ $item->description }}</td>                            
                            <td class='text-center'>
                                <a class="btn btn-primary" href="{{ route('products.edit', ['product' => $item->id]) }}">Editar</a>                                
                                <!-- Formulário para ação de exclusão -->
                                <form action="{{ route('products.destroy', ['product' => $item->id]) }}" method="POST" style="display:inline;">
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
    {{ $produtos->links() }}
</div>
@endsection