<?php
    if(isset($_POST['enviar']))
    {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluguel de Imoveis</title>
    <style>
        body{
            font-family:Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, black
            , white);
        }
        .telaL
        {
           background-color:rgba(0, 0, 0, 0.8);
           position: absolute;
           top: 50%;
           left: 50%;
           transform: translate(-50%,-50%);
           padding: 80px;
           border-radius: 20px;
           color: white;
        }
        .login2
        {
            padding: 15px;
            border: none;
        }
        .bt1
        {
            background-color:dodgerblue;
            border-radius: 20px;
            padding: 10px;
            width: 100%;
            color: white;
            cursor: pointer;
        }
        button:hover
        {
            background-color: deepskyblue;
        }
    </style>
</head>
<body>
    <div class="telaL">
        <form action="" method="post">
            <h1> Login </h1>
            <input class ="login2" type="text" placeholder="ID" name="login">
            <br> <br>
            <input class ="login2" type="passaword" placeholder="senha" name="senha">
            <br> <br>
            <button class="bt1" href="telaP.html" name="enviar">Enviar</button>
    </form>
        
    </div>

</body>
</html>
