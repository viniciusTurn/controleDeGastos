@csrf
<div class="row row-margin">
    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
        <label for="product_id">Selecione o produto*:</label>
        <select id="product_id" name="product_id" class="form-control">
            <option value='1'>Teste</option>
            <option value='2'>Mais 1 item</option>
        </select>
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

