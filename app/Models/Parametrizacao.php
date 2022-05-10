<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Parametrizacao extends Model
{
    use HasFactory;

    protected $table = "parametrizacao";
    protected $fillable = ['id','nome'];
    public $timestamps = false;
    protected $guarded = [];

    static function getAll()
    {
        return DB::table('parametrizacao')
                ->select('parametrizacao.id', 'parametrizacao.nome')
                ->get();
    }

    static function saveParametrizacao($parametrizacao)
    {
        try
        {
            DB::BeginTransaction();
            $parametrizacao->save();
            DB::commit();
        } catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    static function deleteParametrizacao($id)
    {
        try
        {
            DB::BeginTransaction();
            $parametrizacao = Parametrizacao::find($id);
            $parametrizacao->delete();
            DB::commit();
        } catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
    }
    
}
