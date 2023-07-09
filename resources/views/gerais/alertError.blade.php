@if($errors->any())
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-danger" role="alert">
                    <h4>Corrija os seguintes erros:</h4>
                    <ul>
                        @foreach($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif