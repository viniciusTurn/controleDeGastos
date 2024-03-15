@extends("layouts.template")

@section('conteudo')

@include('gerais.title')

<div class="container-fluid">    
    <form id="form" class="form-horizontal" action='/venda/salvar' method="POST">     
        @include('forms._formVendas')     
    </form>
</div>

@include('gerais.alertError')

@endsection

@section('js')    
<script src="{{ asset('js/vendaProdutos.js')}}"></script>
@endsection
