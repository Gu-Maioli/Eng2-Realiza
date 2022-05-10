<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateParametrizacao;
use App\Models\Parametrizacao;
use Exception;
use Illuminate\Http\Request;

class ParametrizacaoController extends Controller
{
    public function index()
    {
        $parametrizacao = new Parametrizacao();
        $parametrizacao = $parametrizacao->getAll();
        
        return view('parametrizacao.index', compact('parametrizacao'));
    }

    public function cadastro(StoreUpdateParametrizacao $request)
    {
        try
        {
            $parametrizacao = $this->setInfoParametrizacao($request->all());
            Parametrizacao::saveParametrizacao($parametrizacao);

            return redirect()->route('imovel.index');
        } catch(Exception $e){
            dd($e);
        }
    }


    public function setInfoParametrizacao($request)
    {
        $parametrizacao = new Parametrizacao();
        $parametrizacao = $parametrizacao->fill($request);
        return $parametrizacao;
    }

    public function delete($id)
    {
        try
        {
            Parametrizacao::deleteParametrizacao($id);
        } catch(Exception $e){
            dd($e);
        }
    }
}
