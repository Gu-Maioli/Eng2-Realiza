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
            DB::beginTransaction();
            //dd($logradouro);
            $logradouro->save();
            DB::commit();
        }catch(Exception $e)
        {
            dd($e->getMessage());
            DB::rollBack();
            return 'Error';
        }
    }
}
