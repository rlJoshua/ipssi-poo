<?php

namespace Ipssi\Evaluation;

class Useless
{
    public function division(int $index, int $diviseur)
    {
        $valeurs = [17, 12, 15, 38, 29, 157, 89, -22, 0, 5];

        return $valeurs[$index] / $diviseur;
    }
}
