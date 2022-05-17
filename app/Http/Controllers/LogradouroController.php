<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateLogradouro;
use App\Models\Logradouro;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LogradouroController extends Controller
{
    public function index()
    {
        return view('');
    }

    public function store(Request $request)
    {
        $teste = LogradouroController::verificaStoreLogradouro($request);
    }

    static function verificaStoreLogradouro($request) // inserir no store de logradouro
    {
        $validator = Validator::make($request->all(), [
            'endereco' => 'required|min:5',
            'bairro' => 'required', 
            'numero' => 'required', 
            'cidade' => 'required',
            'uf' => 'required',
            'cep' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('imovel.index') // arrumar
                        ->withErrors($validator)
                        ->withInput();
        }
        $validated = $validator->validated();

        return $validated;
    }
}
