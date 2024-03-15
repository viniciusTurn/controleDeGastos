@extends("layouts.template")

@section('conteudo')

@include('gerais.title')

<div class="container-fluid">    
    <form id="form" class="form-horizontal" action='/relatorio/gerarGraficos' method="POST">     
        @csrf
        <div class="row row-margin">    
            <div class="col-xs-12 col-sm-6 col-lg-2">
                <label for="mes">Mês</label>
                <select id="mes" name="mes" class="form-control">
                    <option value="01">Janeiro</option>
                    <option value="02">Fevereiro</option>
                    <option value="03">Março</option>
                    <option value="04">Abril</option>
                    <option value="05">Maio</option>
                    <option value="06">Junho</option>
                    <option value="07">Julho</option>
                    <option value="08">Agosto</option>
                    <option value="09">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option>
                </select>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-2">
                <label for="ano">Ano</label>
                <input type="number" id="ano" name="ano" class="form-control" value="{{ date('Y') }}">
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-2">   
                <label for="btnSalvar">&nbsp;</label> 
                <button type="submit" id="btnSalvar" class="btn btn-primary form-control">
                    <i class="fa fa-floppy-o"></i> Buscar
                </button>
            </div>
        </div>   
    </form>    
</div>
<div class="container-fluid"> 
    <br>
    <div class="row row-margin">                  
        <div class="col-xs-12" style="max-height: 500px;">
            <canvas id="grafico" style=""></canvas>    
        </div>        
    </div>
</div>

@include('gerais.alertError')

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafico');
    let chart = null;
    
    function construirGrafico(totalCompras, totalVendas, totalDiferenca) {
        console.log(chart);
        if (chart !== null) {
            chart.destroy();
        }


        chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Janeiro'],
                datasets: [
                    {
                        label: 'Compras',
                        data: [totalCompras],
                        borderColor: '#36A2EB',
                        backgroundColor: '#9BD0F5',
                    },
                    {
                        label: 'Vendas',
                        data: [totalVendas],
                        borderColor: '#FF6384',
                        backgroundColor: '#FFB1C1',
                    },
                    {
                        label: 'Diferenca',
                        data: [totalDiferenca],
                        borderColor: '#cc6354',
                        backgroundColor: '#ccB5C1',
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });        
    }
    document.getElementById('form').addEventListener('submit', function (event) {


        event.preventDefault(); // Impede o envio do formulário padrão

        var formData = $('#form').serialize();

        $.ajax({
            url: '/relatorio/gerarGraficos',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                let totalCompras = response.totalCompras;
                let totalVendas = response.totalVendas;
                let totalDiferenca = response.totalDiferenca;

                construirGrafico(totalCompras, totalVendas, totalDiferenca);

            },
            error: function (xhr, status, error) {
                console.error('Erro ao enviar o formulário:', error);
            }
        });
    });
</script>
@endsection