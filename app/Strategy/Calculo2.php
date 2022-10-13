<?php

namespace app\Strategy;

use App\Strategy\Calculo3;

class Calculo2{

    public static function calculoStrategy($imovel)
    {
        if($imovel->tamanho <= 30)
        {
            // calculo
        }
        else
        {
            Calculo3::calculoStrategy($imovel);
        }
    }

}