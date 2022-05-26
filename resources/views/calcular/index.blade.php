<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="resources/css/app.css" rel="stylesheet">
    
<style>
    body {
        background-color: LightSteelBlue;
    }
    .required:after {
        content:" *"; 
        color: red;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
    <title>CRUD IMOVEL</title>
</head>
<body>

    @if(isset($parametrizacao))
        @include('parametrizacao/parametrizacao')
    @endif

<div style="background-color: LightSlateGray; width: 50%" class="container-lg">
    <div class="row">
        <div class="col-sm-5">
            <label for="enderecoInputId" class="form-label required">Endereço</label>
            <input name="endereco" type="text" class="form-control form-control-sm" id="enderecoInputId">
        </div>
        <div class="col-sm-3">
            <label for="bairroInputId" class="form-label required">Bairro</label>
            <input name="bairro" type="text" class="form-control form-control-sm" id="bairroInputId">
        </div>
        <div class="col-sm-3">
            <label for="cidadeInputId" class="form-label required">Cidade</label>
            <input name="cidade" type="text" class="form-control form-control-sm" id="cidadeInputId">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label for="conservacaoInputId" class="form-label required">Estado de conservação</label>
            <input name="conservacao" type="text" class="form-control form-control-sm" id="conservacaoInputId">
        </div>
        <div class="col-sm-3">
            <label for="tipoImovelInputId" class="form-label required">Tipo do Imóvel</label>
            <input name="tipoImovel" type="text" class="form-control form-control-sm" id="tipoImovelInputId">
        </div>
        <div class="col-sm-3">
            <label for="tipoMaterialInputId" class="form-label required">Tipo de Material</label>
            <input name="tipoMaterial" type="text" class="form-control form-control-sm" id="tipoMaterialInputId">
        </div>
        <div class="col-sm-2">
            <label for="metrosInputId" class="form-label required">M²</label>
            <input name="metros" placeholder="Ex: 10" type="text" class="form-control form-control-sm" id="metrosInputId">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-2">
            <label for="valorInputId" class="form-label">Valor</label>
            <input name="valor" disabled type="text" class="form-control form-control-sm" id="valorInputId">
        </div>
    </div>
    <br>
    <div class="d-grid gap-2 d-md-block">
        <a href="{{ route('welcome')}}"><button type="" class="btn btn-warning">Voltar</button></a>
            <button id="btnCalcular" type="button" class="btn btn-success">
                Calcular
            </button>
            <a href="{{ route('calcular.imovel', '1')}}"><button type="" class="btn btn-warning">calc</button></a>
    </div>
</div>
<script>

$( document ).ready(function() {
    
    $("#btnCalcular").click(function()
    {
        event.preventDefault();
        var info = getInfo();
        console.log([info]);
        $.ajax({
            url: "/calcular/imovel",
            dataType: 'json',
            data: {info: JSON.stringify(info)}
        }).done(function(callback){

            if(callback.message == "error"){
                console.log("deu ruim mané");
            }else{
                $("#valorInputId").val(callback.result);
            }
            
        }).fail(function(jqXHR, textStatus, msg){
            
        });


    });

    function getInfo()
    {
        var metros = $('#metrosInputId').val();
        var endereco = $('#enderecoInputId').val();
        var bairro = $('#bairroInputId').val();
        var cidade = $('#cidadeInputId').val();
        var conser = $('#conservacaoInputId').val();
        var tipoI = $('#tipoImovelInputId').val();
        var tipoM = $('#tipoMaterialInputId').val();

        var info = {'metros': metros, 'endereco': endereco, 'bairro': bairro, 'cidade': cidade, 'conser': conser, 'tipoI': tipoI, 'tipoM': tipoM};
        return info;
    }
});
    /*
    $.ajax({
     url : "cadastrar.php",
     type : 'post',
     data : {
          nome : "Maria Fernanda",
          salario :'3500'
     },
     beforeSend : function(){
          $("#resultado").html("ENVIANDO...");
     }
})
.done(function(msg){
     $("#resultado").html(msg);
})
.fail(function(jqXHR, textStatus, msg){
     alert(msg);
});
    */
</script>
</body>
</html>