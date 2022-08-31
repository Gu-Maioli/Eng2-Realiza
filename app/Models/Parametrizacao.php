<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

class Parametrizacao extends Model
{
    use HasFactory;

    protected $table = "parametrizacao";
    protected $fillable = ['id','nome','cnpj','endereco','numero','bairro','cep','cidade','uf'];
    public $timestamps = false;
    protected $guarded = [];

    static function getAll()
    {
        return DB::table('parametrizacao')
                ->select('parametrizacao.id', 'parametrizacao.nome')
                ->get();
    }
    
    static function getParametrizacao()
    {
        return DB::table('parametrizacao')
                ->select('parametrizacao.*')
                ->first();
    }

    static function saveParametrizacao($parametrizacao)
    {
        try
        {
            $parametrizacao->save();
            
        } catch(Exception $e){
            return '';
        }
    }

    static function updateParametrizacao($parametrizacao)
    {
        try
        {
            $parametrizacao->save();

        } catch(Exception $e){
            return '';
        }
    }

    static function deleteParametrizacao($id)
    {
        try
        {            
            $parametrizacao = Parametrizacao::find($id);
            $parametrizacao->delete();
        } catch(Exception $e){
            return '';
        }
    }
    
}
