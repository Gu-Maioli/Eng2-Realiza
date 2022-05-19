<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateImovel;
use App\Models\Imovel;
use App\Models\Logradouro;
use App\Models\Parametrizacao;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImovelController extends Controller
{
    public function index()
    {      
        try
        {
            $imoveis = new Imovel();
            $imoveis = $imoveis->getAll();
    
            $parametrizacao = $this->getParametrizacao();
            
            return view('imovel.showImovel', compact('imoveis', 'parametrizacao'));
        } catch (Exception $e){
            dd($e->getMessage());
        }   
    }

    public function showAlterar($id_imovel)
    {
        $imovel = Imovel::getImovel($id_imovel);
        $logradouro = Logradouro::getLogradouro($imovel->log_id);
        
        return view('imovel.showAlterar', compact('imovel','logradouro'));
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
            $logradouro = $this->setInfoLogradouro($request);

            DB::beginTransaction();
            Logradouro::saveLogradouro($logradouro);
            $imovel = $this->setInfoImovel($request->all(), $logradouro->id);
            Imovel::saveImovel($imovel);
            DB::commit();

            //$logradouro = (new LogradouroController())->store($request);
            //Imovel::create($request->all());
            return redirect()->route('imovel.cadastro');
        }catch(Exception $e){
            DB::rollBack();
        }
    }

    public function delete($id_imovel)
    {
        try
        {
            $imovel = Imovel::findImovel($id_imovel);
            DB::beginTransaction();
            Imovel::deleteImovel($imovel);
            Logradouro::deleteLogradouro($imovel->logradouro_id);
            DB::commit();
            
            return redirect()->route('imovel.index');
        } catch (Exception $e){
            DB::rollBack();
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
        $parametrizacao = new Parametrizacao();
        return $parametrizacao->getParametrizacao();
    }

    static function setInfoLogradouro($request)
    { 
        $dados = LogradouroController::verificaStoreLogradouro($request);
        
        $logradouro = new Logradouro();
        $logradouro->fill($dados);
        
        return $logradouro;
    }
}
