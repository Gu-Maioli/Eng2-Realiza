<?php

namespace app\Strategy;

use App\Strategy\Calculo3;
use App\Interface\CalculoStrategyInterface;

class Calculo2 implements CalculoStrategyInterface { 

    public static function calculoStrategy($imovel)
    {
        $base = 10000;
        $tarifa = 0;
        if($imovel->tamanho <= 30)
        {
            $tarifa = $base * 0.3;
            $imovel->valorImovel = ($base*$imovel->tamanho) + $tarifa;
            $imovel->valorAluguel = ($imovel->valorImovel*0.02/12);
            return $imovel->valorAluguel;
        }
        else
        {
            return Calculo3::calculoStrategy($imovel);
        }
    }

}