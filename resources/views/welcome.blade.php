<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
    body {
        background-color: LightSteelBlue;
    }
    </style>
    <title>Inicio</title>
</head>
<body>
    @if(isset($parametrizacao))
        @include('parametrizacao/parametrizacao')
    @endif
    <br>
    <div style="background-color: LightSlateGray; width: 50%" class="container">
        <br>
        <div class="row">
            <a href="{{ route('imovel.index')}}">
                <button type="button" class="btn btn-primary">
                    Imóveis
                </button>
            </a>
        </div>
        
        <br>

        <div class="row">
            <a href="{{ route('parametrizacao.index')}}">
                <button type="button" class="btn btn-dark">
                    Parametrização
                </button>
            </a>
        </div>
        <br>
    </div>
</body>
</html>