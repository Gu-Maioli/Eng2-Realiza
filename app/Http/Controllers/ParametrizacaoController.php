<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateParametrizacao;
use App\Models\Parametrizacao;
use Exception;
use Illuminate\Http\Request;

class ParametrizacaoController extends Controller
{
    public function welcome()
    {
        $parametrizacao = $this->getParametrizacao();
        
        return view('welcome', compact('parametrizacao'));
    }

    public function index()
    {
        $arrayParametrizacao = new Parametrizacao();
        $arrayParametrizacao = $arrayParametrizacao->getAll();
        $parametrizacao = $this->getParametrizacao();
        
        return view('parametrizacao.index', compact('arrayParametrizacao', 'parametrizacao'));
    }

    public function cadastro(StoreUpdateParametrizacao $request)
    {
        try
        {
            $parametrizacao = $this->setInfoParametrizacao($request->all());
            Parametrizacao::saveParametrizacao($parametrizacao);
            
            return redirect()->action([ParametrizacaoController::class, 'welcome']);

        } catch(Exception $e){
            dd($e->getMessage());
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

            return redirect()->action([ParametrizacaoController::class, 'welcome']);
        } catch(Exception $e){
            dd($e);
        }
    }

    public function getParametrizacao()
    {
        $parametrizacao = new Parametrizacao();
        
        return ($parametrizacao->getParametrizacao());
    }
}
