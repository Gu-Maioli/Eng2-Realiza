<?php

namespace app\Strategy;

use App\Strategy\Calculo2;

class Calculo1{

    public function calculoStrategy($imovel)
    {
        $base = 10000;
        $tarifa = 0;
        if($imovel->tamanho <= 20)
        {
            $tarifa = $base * 0.2;
            $imovel->valorImovel = ($base*$imovel->tamanho) + $tarifa;
            $imovel->valorAluguel = ($imovel->valorImovel*0.02/12);
            return $imovel->valorAluguel;
        }
        else
        {
            return Calculo2::calculoStrategy($imovel);
        }
    }

}