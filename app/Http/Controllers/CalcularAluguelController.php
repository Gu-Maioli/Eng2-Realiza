<?php

namespace App\Http\Controllers;

use App\Models\Parametrizacao;
use Exception;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

class CalcularAluguelController extends Controller
{
    public function index()
    {
        $parametrizacao = $this->getParametrizacao();
            
        return view('calcular.index', compact('parametrizacao'));
    }

    public function getParametrizacao()
    {
        $parametrizacao = new Parametrizacao();
        return $parametrizacao->getParametrizacao();
    }

    public function calcular()
    {
        try{
            $callback['message'] = "";
            $callback['result'] = "";

            $dados = $this->makeArray();
            $info = json_decode($_GET['info']);
            
            $valor = $this->makeValor($dados, $info);

            $this->makeArray();
            return['message'=>"success", 'result'=> $valor];
        } catch (Exception $e){
            return['message'=>"error", 'result'=> ""];
        }
    }

    public function makeValor($dados, $info)
    {
        $base = 3000;
        $valor = 0;
        if(isset($info->bairro))
        {
            $valor += $this->makeCalculo($dados, $info->bairro);
        }
        if(isset($info->endereco))
        {
            $valor += $this->makeCalculo($dados, $info->endereco);
        }
        if(isset($info->cidade))
        {
            $valor += $this->makeCalculo($dados, $info->cidade);
        }
        if(isset($info->conservacao))
        {
            $valor += $this->makeCalculo($dados, $info->conservacao);
        }
        if(isset($info->tipoI))
        {
            $valor += $this->makeCalculo($dados, $info->tipoI);
        }
        if(isset($info->tipo_M))
        {
            $valor += $this->makeCalculo($dados, $info->tipo_M);
        }

        return ($valor+$base)*$info->metros;
    }

    public function makeCalculo($dados, $info)
    {
        $base = 3000;
        $valor = 0;
        foreach($dados as $dado){
            if(key($dado) == $info)
            {
                $valor = $dado[key($dado)] * $base;
            }
        }
        return $valor;
    }

    public function makeArray()
    {
        $dados['bairro'] = ['centro' => 0.8];
        $dados['endereco'] = ['rua' => 0.3, 'avenida' => 0.2];
        $dados['cidade'] = ['pirapozinho' => 0.4, 'presidente prudente' => 0.5,'tarabai' => 0.2];
        $dados['conservacao'] = ['boa' => 0.3, 'media' => 0.1, 'ruim' => 0.08];
        $dados['tipoI'] = ['casa' => 0.6, 'sobrado' => 0.2, 'apartamento' => 0.5, 'kitnet' => 0.2];
        $dados['tipo_M'] = ['alvenaria' => 0.4, 'madeira' => 0.2, 'palha' => 0.04];
        
        return $dados;
    }
}
