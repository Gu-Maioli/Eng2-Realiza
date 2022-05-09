<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Imovel extends Model
{
    use HasFactory;

    protected $table = "imovel";
    protected $fillable = ['descricao', 'status_atual', 'logradouro_id'];
    public $timestamps = false;
    protected $guarded = [];

    public function hasOneLogradouro()
    {
        return $this->hasOne(Logradouro::class, 'endereco', 'id');
    }

    static function getImovel($id)
    {
        return DB::table('imovel')
                ->join('logradouro', 'imovel.logradouro_id', 'logradouro.id')
                ->where('imovel.id', $id)
                ->select('imovel.*')
                ->first();
    }

    public function getAll()
    {
        return DB::table('imovel')
                ->join('logradouro', 'imovel.logradouro_id', 'logradouro.id')
                ->select('imovel.*', 'logradouro.*')
                ->get();
    }

    static function saveImovel($imovel)
    {
        try
        {
            DB::beginTransaction();
            $imovel->save();
            DB::commit();
        }catch(Exception $e)
        {
            dd($e->getMessage());
            DB::rollBack();
            return 'Error';
        }
    }
}
