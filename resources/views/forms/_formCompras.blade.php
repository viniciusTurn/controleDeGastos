@csrf
<div class="row row-margin">
    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
        <label for="product_id">Selecione o produto*:</label>
        <select id="product_id" name="product_id" class="form-control"> 
            @if(!is_null(old('product_id')))
                <option value="{{ old('product_id') }}" selected>{{ old('product_id_name') }}</option>
            @elseif(!is_null($productsEntry->product_id))
                <option value="{{ $productsEntry->product_id }}" selected>{{ $productsEntry->product->description }}</option>
            @endif
        </select>
        @if(!is_null(old('product_id')))
            <input type="hidden" id="product_id_name" name="product_id_name" value="{{ old('product_id_name') }}">
        @elseif(!is_null($productsEntry->product_id))
            <input type="hidden" id="product_id_name" name="product_id_name" value="{{ $productsEntry->product->description }}">
        @else
            <input type="hidden" id="product_id_name" name="product_id_name">
        @endif       
    </div>
    <div class="col-xs-12 col-sm-4 col-md-6 col-lg-2">
        <label for="quantity">Quantidade do produto*:</label>               
        <input type="number" class="form-control" min="1" name="quantity" max="99999" id="quantity" step="1" value="{{ old('quantity', $productsEntry->quantity) }}"/>
    </div>  
    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-2">
        <label for="unity_price">Preço do produto*:</label>               
        <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="number" step="0.01" name="unity_price" id="unity_price" placeholder="Digite o valor" class="form-control" value="{{ old('unity_price', $productsEntry->unity_price) }}">
        </div>                
    </div>
    <div class="col-xs-12 col-sm-4 col-md-6 col-lg-2">  
        <label>&nbsp;</label>   
        <button type="submit" id="btnSalvar" class="btn btn-primary form-control">
            <i class="fa fa-floppy-o"></i> Salvar
        </button>
    </div>    
</div>        

