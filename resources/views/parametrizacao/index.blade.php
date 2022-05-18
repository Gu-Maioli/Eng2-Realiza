<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/app.css" rel="stylesheet">
<style>
    body {
        background-color: LightSteelBlue;
    }
    .required:after {
        content:" *"; 
        color: red;
    }
</style>
    <title>Parametrização</title>
</head>
<body>
    @if(isset($parametrizacao))
        @include('parametrizacao/parametrizacao')
    @endif
<br>
    <div style="background-color: LightSlateGray; width: 50%" class="container-sm">

    @if(isset($parametrizacao))
        <form action="{{ route('parametrizacao.alterar') }}" method="post">
    @else
        <form action="{{ route('parametrizacao.cadastro') }}" method="post">
    @endif
            @csrf
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
            <input type="hidden" id="id" name="id" value="{{$parametrizacao ? $parametrizacao->id : ''}}">
            <div class="row">
                <div class="col-sm-6">
                    <label for="nomeInputId" class="form-label required">Nome</label>
                    <input name="nome" value="{{$parametrizacao ? $parametrizacao->nome : ''}}" type="text" class="form-control form-control-sm" id="nomeInputId">
                </div>
                <div class="col-sm-3">
                    <label for="cnpjInputId" class="form-label required">CNPJ</label>
                    <input name="cnpj" value="{{$parametrizacao ? $parametrizacao->cnpj : ''}}" type="text" class="form-control form-control-sm" id="cnpjInputId">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label for="enderecoInputId" class="form-label required">Endereço</label>
                    <input name="endereco" value="{{$parametrizacao ? $parametrizacao->endereco : ''}}" type="text" class="form-control form-control-sm" id="enderecoInputId">
                </div>
                <div class="col-sm-2">
                    <label for="numeroInputId" class="form-label required">N°</label>
                    <input name="numero" value="{{$parametrizacao ? $parametrizacao->numero : ''}}" type="number" class="form-control form-control-sm" id="numeroInputId">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <label for="cidadeInputId" class="form-label required">Cidade</label>
                    <input name="cidade" value="{{$parametrizacao ? $parametrizacao->cidade : ''}}" type="text" class="form-control form-control-sm" id="cidadeInputId">
                </div>
                <div class="col-sm-3">
                    <label for="bairroInputId" class="form-label required">Bairro</label>
                    <input name="bairro" value="{{$parametrizacao ? $parametrizacao->bairro : ''}}" type="text" class="form-control form-control-sm" id="bairroInputId">
                </div>
                <div class="col-sm-2">
                    <label for="cepInputId" class="form-label required">CEP</label>
                    <input name="cep" value="{{$parametrizacao ? $parametrizacao->cep : ''}}" type="text" class="form-control form-control-sm" id="cepInputId">
                </div>
                <div class="col-sm-1">
                    <label for="ufInputId" class="form-label required">UF</label>
                    <input name="uf" value="{{$parametrizacao ? $parametrizacao->uf : ''}}" type="text" class="form-control form-control-sm" id="ufInputId">
                </div>
            </div>
            <br>
            <div class="d-grid gap-2 d-md-block">
                <a href="{{ route('welcome') }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
                <button type="submit" id="confirmarBtnId" class="btn btn-success">Confirmar</button>
            </div>
            <br>
        </form>
    </div>
    <script>
        $parametrizacao = document.getElementById('nomeInputId').value;
        if($parametrizacao != "")
        {
            document.getElementById("confirmarBtnId").innerHTML = "Alterar";
        }
    </script>
</body>
</html>