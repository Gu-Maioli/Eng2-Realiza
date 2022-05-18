<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Logradouro extends Model
{
    use HasFactory;

    protected $table = "logradouro";
    protected $fillable = ['id','endereco', 'bairro', 'complemento', 'numero', 'cidade', 'uf', 'cep'];
    public $timestamps = false;
    protected $guarded = [];

    static function saveLogradouro($logradouro)
    {
        try
        {
            $logradouro->save();
        }catch(Exception $e)
        {
            return 'Error';
        }
    }

    static function deleteLogradouro($id)
    {
        try
        {
            $logradouro = Logradouro::find($id);
            $logradouro->delete();
            
        } catch(Exception $e){
            return'';
        }
    }
}
