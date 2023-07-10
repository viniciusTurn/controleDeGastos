@extends("layouts.template")

@section('conteudo')

@include('gerais.title')

<div class="container-fluid">    
    <form id="form" class="form-horizontal" action='/products/atualizar' method="POST">  
        @include('forms._form')
        <input type="hidden" id="productId" name="productId" value="{{ $produto->id }}">
    </form>
</div>

@include('gerais.alertError')

@endsection
