@csrf
<div class="row row-margin">
    <div class="col-xs-12 col-sm-6">
        <label for="description">Descrição do produto*:</label>
        <input type="text" class="form-control" maxlength="100" name="description" id="description" value="{{ old('description', $produto->description) }}"/>
    </div>
    <div class="col-xs-12 col-sm-2">
        <label for="amount">Quantidade do produto*:</label>               
        <input type="number" class="form-control" min="1" name="amount" max="99999" id="amount" step="1" value="{{ old('amount', $produto->amount) }}"/>
    </div>  
    <div class="col-xs-12 col-sm-2">
        <label for="unity_price">Preço do produto*:</label>               
        <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input type="number" step="0.01" name="unity_price" id="unity_price" placeholder="Digite o valor" class="form-control" value="{{ old('unity_price', $produto->unity_price) }}">
        </div>                
    </div>    
</div>        
<div class="row row-margin text-end">
    <div class="col-xs-12">                
        <button type="submit" id="btnSalvar" class="btn btn-primary btn-block">
            <i class="fa fa-floppy-o"></i> Salvar
        </button>
    </div>
</div>

