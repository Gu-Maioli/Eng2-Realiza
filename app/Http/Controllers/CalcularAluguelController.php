<?php

namespace App\Http\Controllers;

use App\Models\Parametrizacao;
use Exception;
use Illuminate\Http\Request;

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

    public function calcular($metros)
    {
        try{
            $callback['message'] = "";
            $callback['result'] = "";
            $valor = $metros * 10000;

            return['message'=>"success", 'result'=> $valor];
        } catch (Exception $e){
            return['message'=>"error", 'result'=> ""];
        }
    }
}
