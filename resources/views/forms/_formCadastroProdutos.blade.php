@csrf
<div class="row row-margin">
    <div class="col-xs-12 col-md-8 col-lg-9">
        <label for="description">Descrição do produto*:</label>
        <input type="text" class="form-control" maxlength="100" name="description" id="description" value="{{ old('description', $produto->description) }}"/>
    </div>     
    <div class="col-xs-12 col-md-4 col-lg-3">  
        <label>&nbsp;</label>
        <button type="submit" id="btnSalvar" class="btn btn-primary form-control">
            <i class="fa fa-floppy-o"></i> Salvar
        </button>
    </div>
</div>        

