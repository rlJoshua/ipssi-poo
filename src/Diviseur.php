<?php

namespace Ipssi\Evaluation;
use Ipssi\Evaluation\Exception\InvalidIndexException;


class Diviseur
{
    public function division($index, $diviseur)
    {
        $valeurs = [17, 12, 15, 38, 29, 157, 89, -22, 0, 5];

        //Verifie si @index n'est pas un entier
        if(!is_numeric($index))
        {
            throw new \TypeError($index);
            return;
        }
        //Verifie si @diviseur n'est pas un entier
        if (!is_numeric($diviseur))
        {
            throw new \TypeError($diviseur);
            return;
        }
        //Verifie si @index n'existe pas dans le tableau @valeur
        if(!isset($valeurs[$index]))
        {
            throw new InvalidIndexException($index);
            return;
        }
        //Verifie si @diviseur egale a 0
        if ($diviseur == 0)
        {
            throw new \DivisionByZeroError($index);
        }

        return $valeurs[$index] / $diviseur;
    }
}