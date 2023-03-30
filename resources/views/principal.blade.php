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
                    <th class='col text-center'>Produto</th>
                    <th class='col text-center'>Quantidade em estoque</th>
                    <th class='col text-center'>Preço unitário</th>
                    <th class="col btsAcao-2 text-center">Ação</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection