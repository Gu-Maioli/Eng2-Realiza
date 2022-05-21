<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateImovel extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'descricao' => 'required',
            'endereco' => 'required',
            'bairro' => 'required', 
            'numero' => 'required', 
            'cidade' => 'required',
            'uf' => 'required',
            'cep' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'O campo Descrição é obrigatório seu preenchimento',
            'endereco.required' => 'O campo Endereco é obrigatório seu preenchimento',
            'numero.required' => 'O campo Número é obrigatório seu preenchimento',
            'uf.required' => 'O campo UF é obrigatório seu preenchimento',
            'bairro.required' => 'O campo Bairro é obrigatório seu preenchimento',
            'cidade.required' => 'O campo Cidade é obrigatório seu preenchimento',
            'cep.required' => 'O campo CEP é obrigatório seu preenchimento',
        ];
    }
}
