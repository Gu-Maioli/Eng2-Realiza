<?php

namespace app\Strategy;
use App\Interface;

class Calculo3 extends ValorImovelInterface{

    public static function calculoStrategy($imovel)
    {
        $base = 10000;
        $tarifa = 0;
        $tarifa = $base * 0.4;
        $imovel->valorImovel = ($base*$imovel->tamanho) + $tarifa;
        $imovel->valorAluguel = ($imovel->valorImovel*0.02/12);
        return $imovel->valorAluguel;
    }

}