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
<!--    <script src="{{ asset('js/compra.js')}}" type="module"></script>-->
    <script type="module">
        import { hoje } from "../js/novo.js";        
//         console.log(MyModule);
//        console.log(MyModule.hoje);
    </script>
@endsection
