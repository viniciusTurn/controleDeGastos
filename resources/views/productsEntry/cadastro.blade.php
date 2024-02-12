@extends("layouts.template")

@section('conteudo')

@include('gerais.title')

<div class="container-fluid">    
    <form id="form" class="form-horizontal" action='/compra/salvar' method="POST">  
        @include('forms._formCompras')
    </form>
</div>

@include('gerais.alertError')

@endsection

@section('js')    
<script src="{{ asset('js/entradaProdutos.js')}}"></script>
@endsection
