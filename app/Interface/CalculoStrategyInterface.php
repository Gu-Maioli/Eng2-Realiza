<?php

namespace app\Interface;

use App\Models\Imovel;

interface CalculoStrategyInterface
{
    public function calculoStrategy(Imovel $imovel);
}