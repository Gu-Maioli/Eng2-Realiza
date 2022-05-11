<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateImovel;
use App\Models\Imovel;
use Exception;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    public function index()
    {
        $imoveis = new Imovel();
        $imoveis = $imoveis->getAll();

        $parametrizacao = $this->getParametrizacao();
        
        try{
            return view('imovel.showImovel', compact('imoveis', 'parametrizacao'));
        } catch (Exception $e){
            dd($e->getMessage());
        }
        
    }

    public function cadastro()
    {
        $parametrizacao = $this->getParametrizacao();
        
        return view('imovel.cadastroImovel', compact('parametrizacao'));
    }

    public function show()
    {
        return view('imovel.showImovel');
    }

    public function store(StoreUpdateImovel $request)
    {
        try
        {
            $logradouro = LogradouroController::setInfoLogradouro($request);
            LogradouroController::saveLogradouro($logradouro);
            
            $imovel = $this->setInfoImovel($request->all(), $logradouro->id);
            Imovel::saveImovel($imovel);

            //$logradouro = (new LogradouroController())->store($request);
            //Imovel::create($request->all());
            return redirect()->route('imovel.cadastro');
        }catch(Exception $e){

        }
    }

    public function delete($id_imovel)
    {
        try
        {
            $imovel = Imovel::findImovel($id_imovel);
            Imovel::deleteImovel($imovel);
            LogradouroController::deleteLogradouro($imovel->logradouro_id);
            return redirect()->route('imovel.index');
        } catch (Exception $e){
            dd($e->getMessage());
        }
        
        
    }

    public function setInfoImovel($dados, $logradouro_id)
    {
        try
        {
            $imovel = new Imovel();
            $imovel->fill($dados);
            $imovel->logradouro_id = $logradouro_id;

            return $imovel;
        } catch(Exception $e){
            dd($e);
            return '';
        }
    }

    public function getParametrizacao()
    {
        $parametrizacao = new ParametrizacaoController();
        return $parametrizacao->getParametrizacao();
    }
}
