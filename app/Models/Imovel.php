<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Strategy\Calculo1;

class Imovel extends Model
{
    use HasFactory;

    protected $table = "imovel";
    protected $fillable = ['descricao', 'status_atual', 'logradouro_id', 'user_id', 
                           'valorAluguel', 'valorImovel', 'tamanho'];
    public $timestamps = false;
    protected $guarded = [];
    private static Imovel $instance;

    public static function getInstance(): Imovel
    {
        if(!isset(self::$instance))
            self::$instance = new Imovel();
        
        return self::$instance;
    }

    public static function calcularImovel($imovel)
    {
        $teste = new Calculo1();
        $teste->calculoStrategy($imovel);
        
        dd($imovel);
        // aqui ta o calculo que fizemo em aula acho que é só usar ele no strategy
        /*$base = 10000;
        $tarifa = 0;
        
        if($imovel->tamanho <= 20)
        {
            $tarifa = $base * 0.2;
        }
        else 
        {
            if($imovel->tamanho <= 30)
                $tarifa = $base * 0.3;
            else
                if($imovel->tamanho <= 40)
                    $tarifa = $base * 0.4;
                else
                    $tarifa = $base * 0.7;
        }
        $imovel->valorImovel = ($base*$imovel->tamanho) + $tarifa;
        $imovel->valorAluguel = ($imovel->valorImovel*0.02/12);*/
    }

    public function __construct(){ }

    static function getImovel($id)
    {
        return DB::table('imovel')
                ->join('logradouro', 'imovel.logradouro_id', 'logradouro.id')
                ->where('imovel.id', $id)
                ->select('imovel.id', 'imovel.descricao',
                         'logradouro.id as log_id'/*,'logradouro.endereco', 'logradouro.bairro', 'logradouro.complemento',
                          'logradouro.numero', 'logradouro.cidade', 'logradouro.uf', 'logradouro.cep'*/)
                ->first();
    }

    public function getAll()
    {
        return DB::table('imovel')
                ->join('logradouro', 'imovel.logradouro_id', 'logradouro.id')
                ->select('imovel.id', 'imovel.descricao', 'imovel.logradouro_id',
                         'logradouro.complemento', 'logradouro.cep', 'logradouro.uf',
                         'logradouro.numero', 'logradouro.endereco', 'logradouro.bairro',
                         'logradouro.cidade')
                ->get();
    }

    public function getImovelFilter($pesquisa)
    {
        return DB::table('imovel')
                ->join('logradouro', 'imovel.logradouro_id', 'logradouro.id')
                ->orWhere('logradouro.endereco', 'ILIKE', '%'.$pesquisa.'%')
                ->orWhere('logradouro.bairro', 'ILIKE', '%'.$pesquisa.'%')
                ->orWhere('logradouro.cidade', 'ILIKE', '%'.$pesquisa.'%')
                ->select('imovel.id', 'imovel.descricao', 'imovel.logradouro_id',
                         'logradouro.complemento', 'logradouro.cep', 'logradouro.uf',
                         'logradouro.numero', 'logradouro.endereco', 'logradouro.bairro',
                         'logradouro.cidade')
                ->get();
    }

    static function saveImovel($imovel)
    {
        try
        {
            $imovel->save();
        }catch(Exception $e)
        {
            return 'Error';
        }
    }

    public static function findImovel($id)
    {
        return Imovel::find($id)->first();
    }

    static function deleteImovel($imovel)
    {
        try
        {
            $imovel->delete();
        }catch(Exception $e)
        {
            return 'Error';
        }
    }
}
