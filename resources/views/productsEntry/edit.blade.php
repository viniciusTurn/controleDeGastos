@extends("layouts.template")

@section('conteudo')

@include('gerais.title')

<div class="container-fluid">    
    <form id="form" class="form-horizontal" action="{{ route('productsEntry.update', ['productsEntry' => $productsEntry->id]) }}" method="POST">  
        @method('PUT')
        @include('forms._formCompras')        
    </form>
</div>

@include('gerais.alertError')

@endsection
