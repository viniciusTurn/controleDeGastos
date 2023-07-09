@extends("layouts.template")

@section('conteudo')

@include('gerais.title')

<div class="container-fluid">    
    <form id="form" class="form-horizontal" action='/products/salvar' method="POST">  
        @include('forms._form')
    </form>
</div>

@include('gerais.alertError')

@endsection