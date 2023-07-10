@extends("layouts.template")

@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <h4>Venda de produtos</h4>
        </div>
    </div>
</div>
<div class="container-fluid">    
    <form id="form" class="form-horizontal" action='/products/salvar' method="POST">     
        @csrf
        <div class="row row-margin">
            <div class="col-xs-12 col-sm-6">
                <label for="product">Produto*:</label>
                <select class="form-control" id="product"></select>
            </div>
            <div class="col-xs-12 col-sm-2">
                <label for="amount">Quantidade do produto*:</label>               
                <input type="number" class="form-control" min="1" name="amount" max="99999" id="amount" step="1"/>
            </div>  
            <div class="col-xs-12 col-sm-2">
                <label for="total">Total:</label>               
                <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="number" step="0.01" id="total" class="form-control" disabled>
                </div>                
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
    </form>
</div>
@endsection