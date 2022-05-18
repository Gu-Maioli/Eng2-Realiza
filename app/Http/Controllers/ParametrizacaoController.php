<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateParametrizacao;
use App\Models\Parametrizacao;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParametrizacaoController extends Controller
{
    public function welcome()
    {
        $parametrizacao = $this->getParametrizacao();
        
        return view('welcome', compact('parametrizacao'));
    }

    public function index()
    {
        $parametrizacao = $this->getParametrizacao();
        
        return view('parametrizacao.index', compact('parametrizacao'));
    }

    public function cadastro(StoreUpdateParametrizacao $request)
    {
        try
        {
            $parametrizacao = $this->setInfoParametrizacao($request->all());
            
            DB::BeginTransaction();
            Parametrizacao::saveParametrizacao($parametrizacao);
            DB::commit();
            
            return redirect()->action([ParametrizacaoController::class, 'welcome']);

        } catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function alterar(Request $request)
    {
        try
        {
            $parametros = $request->all();
            $parametrizacao = $this->searchParametrizacao($request->all('id'));
            $parametrizacao = $this->replaceDataParametrizacao($parametrizacao, $parametros);
            
            DB::BeginTransaction();
            Parametrizacao::updateParametrizacao($parametrizacao);
            DB::commit();
            
            return redirect()->action([ParametrizacaoController::class, 'welcome']);

        } catch(Exception $e){
            DB::rollBack();
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
            DB::BeginTransaction();
            Parametrizacao::deleteParametrizacao($id);
            DB::commit();

            return redirect()->action([ParametrizacaoController::class, 'welcome']);
        } catch(Exception $e){
            DB::rollBack();
            dd($e);
        }
    }

    public function getParametrizacao()
    {
        $parametrizacao = new Parametrizacao();
        
        return ($parametrizacao->getParametrizacao());
    }

    public function searchParametrizacao($idParametrizacao)
    {
        return Parametrizacao::find($idParametrizacao)->first();
    }

    public function replaceDataParametrizacao($parametrizacao, $parametros)
    {
        return($parametrizacao->fill($parametros));
    }
}
