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
    <title>Show</title>
</head>
<body>
<br>
    
    @if(isset($parametrizacao))
        @include('parametrizacao/parametrizacao')
    @endif

    <div style="background-color: LightSlateGray; width: 50%" class="container-sm">
    <br>
    <form action="{{ route('imovel.index') }}" method="get">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button type="submit" id="pesquisarBtnId" class="btn btn-info">Pesquisar</button>
            </div>
            <input id="pesquisarInputId" name="pesquisar" type="text" style="text-align: center;" class="form-control" placeholder="Pesquisar...">
        </div>
    </form>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Logradouro</th>
                <th scope="col">Valor Aluguel</th>
                <th scope="col">Valor Imóvel</th>
                <th scope="col">Descrição</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
    @foreach($imoveis as $imovel)
        <?php $i=1 ?>
        <tbody>
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$imovel->endereco}}, N°{{$imovel->numero}}, {{$imovel->bairro}} - {{$imovel->cidade}} {{$imovel->uf}}</td>
                <td>{{$imovel->valorAluguel}}</td>
                <td>{{$imovel->valorImovel}}</td>
                <td>{{$imovel->descricao}}</td>
                <td>
                    <form action="{{ route('imovel.delete', $imovel->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button onclick="return confirm('Tem certeza que deseja deletar este registro?')"
                        type="submit" class="btn btn-outline-danger btn-sm">Excluir</button>
                    <a href="{{ route('imovel.showAlterar', $imovel->id) }}"><button type="button" 
                        class="btn btn-outline-info btn-sm">Alterar</button></a>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>

    <a href="{{ route('imovel.cadastro')}}">    
        <button type="submit" class="btn btn-primary">
            Cadastrar Imóveis
        </button>
    </a>

    <a href="{{ route('welcome')}}">    
        <button type="submit" class="btn btn-warning">
            Voltar
        </button>
    </a>
    </div>
</body>
</html>