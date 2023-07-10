@extends("layouts.template")

@section('conteudo')

@include('gerais.title')

<div class="container-fluid">    
    <form id="form" class="form-horizontal" action="{{ route('products.update', ['product' => $produto->id]) }}" method="POST">  
        @method('PUT')
        @include('forms._formCadastroProdutos')        
    </form>
</div>

@include('gerais.alertError')

@endsection
