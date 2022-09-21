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
    <title>CRUD IMOVEL</title>
</head>
<body>

    @if(isset($parametrizacao))
        @include('parametrizacao/parametrizacao')
    @endif

<div style="background-color: LightSlateGray; width: 50%" class="container-lg">

    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <form action="{{ route('imovel.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-5">
            <label for="enderecoInputId" class="form-label required">Endereço</label>
            <input name="endereco" type="text" class="form-control form-control-sm" id="enderecoInputId">
        </div>
        <div class="col-sm-2">
            <label for="bairroInputId" class="form-label required">Bairro</label>
            <input name="bairro" type="text" class="form-control form-control-sm" id="bairroInputId">
        </div>
        <div class="col-sm-2">
            <label for="numeroInputId" class="form-label required">N°</label>
            <input name="numero" type="number" class="form-control form-control-sm" id="numeroInputId">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <label for="cidadeInputId" class="form-label required">Cidade</label>
            <input name="cidade" type="text" class="form-control form-control-sm" id="cidadeInputId">
        </div>
        <div class="col-sm-2">
            <label for="cepInputId" class="form-label required">CEP</label>
            <input name="cep" oninput="mascara(this)" type="text" class="form-control form-control-sm" id="cepInputId">
        </div>
        <div class="col-sm-1">
            <label for="ufInputId" class="form-label required">UF</label>
            <input name="uf" type="text" class="form-control form-control-sm" id="ufInputId">
        </div>
        <div class="col-sm-2">
            <label for="complementoInputId" class="form-label">Complemento</label>
            <input name="complemento" type="text" class="form-control form-control-sm" id="complementoInputId">
        </div>
        <div class="col-sm-2">
            <label for="tamanho" class="form-label required">M²</label>
            <input name="tamanho" type="number" class="form-control form-control-sm" id="tamanhoInputId">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <label for="descricao" class="form-label required">Descrição</label>
            <textarea name="descricao" class="form-control" id="descricaoId" rows="3"></textarea>
        </div>
    </div>
    <br>
    <div class="d-grid gap-2 d-md-block">
        <button type="submit" class="btn btn-success">Confirmar</button>
        <a href="{{ route('imovel.index')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
        <a href="{{ route('imovel.index')}}"><button type="button" class="btn btn-secondary">Voltar</button></a>
    </div>
    <br>
    </form>
</div>
<script>
    function mascara(i)
    {   
        var v = i.value;
        
        if(isNaN(v[v.length-1])){
            i.value = v.substring(0, v.length-1);
            return;
        }
        
        i.setAttribute("maxlength", "10");
        if (v.length == 2 ) i.value += ".";
        if (v.length == 6) i.value += "-";
    }
</script>
</body>
</html>