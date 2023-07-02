@extends("layouts.template")

@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <h4>Cadastro de produtos</h4>
        </div>
    </div>
</div>
<div class="container-fluid">    
    <form id="form" class="form-horizontal" action='/products/salvar' method="POST">     
        @csrf
        <div class="row row-margin">
            <div class="col-xs-12 col-sm-6">
                <label for="descricao">Descrição do produto*:</label>
                <input type="text" class="form-control" maxlength="100" name="descricao" id="descricao" value="{{ $produto->NOME }}"/>
            </div>
            <div class="col-xs-12 col-sm-2">
                <label for="quantidade">Quantidade do produto*:</label>               
                <input type="number" class="form-control" min="1" name="quantidade" max="99999" id="quantidade" step="1" value="{{ $produto->QUANTIDADE_EM_ESTOQUE }}"/>
            </div>  
            <div class="col-xs-12 col-sm-2">
                <label for="preco">Preço do produto*:</label>               
                <input type="number" class="form-control" min="1" name="preco" id="preco" step="1" value="{{ $produto->PRECO_UNITARIO }}"/>
            </div>    
        </div>        
        <div class="form-group row-margin-2x">
            <div class="col-xs-12 col-md-12">
                <div class="alert alert-danger" role="alert" id="errorDiv" style="display: none">
                    <h4>Atenção! Por favor, corrija os seguintes campos:</h4><br>
                    <ul></ul>
                </div>
            </div>
        </div>
        <div class="row row-margin float-end">
            <div class="col-xs-12">                
                <button type="submit" id="btnSalvar" class="btn btn-primary btn-block">
                    <i class="fa fa-floppy-o"></i> Salvar
                </button>
            </div>
        </div>
        <input type="hidden" id="{{ $produto->id }}">
    </form>
</div>
@endsection