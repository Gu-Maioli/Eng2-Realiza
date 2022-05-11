<!DOCTYPE html>
<html lang="pt-br">
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
    <title>Parametrização</title>
</head>
<body>
    @if(isset($parametrizacao))
        @include('parametrizacao/parametrizacao')
    @endif
<br>
    <div style="background-color: LightSlateGray; width: 50%" class="container-sm">
        <form action="{{ route('parametrizacao.cadastro')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-5">
                    <label for="nomeInputId" class="form-label">Nome</label>
                    <input name="nome" type="text" class="form-control form-control-sm" id="nomeInputId">
                </div>
            </div>
            <br>
            <div class="d-grid gap-2 d-md-block">
                <button type="submit" class="btn btn-success">Confirmar</button>
                <a href="{{ route('welcome')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
                <a href="{{ route('welcome')}}"><button type="button" class="btn btn-secondary">Voltar</button></a>
            </div>
        </form>
    </div>
    <br><br>
    <div style="background-color: LightSlateGray; width: 50%" class="container-sm">
        <div class="row">
        @foreach($arrayParametrizacao as $P)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">*</th>
                    <td>{{$P->nome}}</td>
                    <td>X</td>
                    <td>
                        <form action="{{ route('parametrizacao.delete', $P->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    @endforeach            
        </div>
        <br>
    </div>
</body>
</html>