<?php

namespace app\Strategy;

use App\Strategy\Calculo2;

class Calculo1{

    public function calculoStrategy($imovel)
    {
        if($imovel->tamanho <= 20)
        {
            //$imovel->valorAluguel = 1000;
        }
        else
        {
            Calculo2::calculoStrategy($imovel);
        }
    }

}