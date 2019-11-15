<?php

use Ipssi\Evaluation\Adherent;
use Ipssi\Evaluation\Bibliotheque;
use Ipssi\Evaluation\Oeuvre;
use Ipssi\Evaluation\Pret;

require_once('vendor/autoload.php');

$oeuvres = array(
    new Oeuvre('3000F', 'Le Loup',true),
    new Oeuvre('3001F', 'Le Loup',true),
    new Oeuvre('3002F', 'Le Loup',false),
    new Oeuvre('5001F', 'La chèvre',true),
    new Oeuvre('5001F', 'La chèvre',true),
    new Oeuvre('5001F', 'La chèvre',false),
    new Oeuvre('5001F', 'La chèvre',false)
);

$adherents = array(
    new Adherent('Joshua' ),
    new Adherent('Mathis', array($oeuvres[0])),
    new Adherent('David', array($oeuvres[3])),
    new Adherent('Melanie', array($oeuvres[4])),
    new Adherent('Elisabeth', array($oeuvres[1]))
);

$bibliotheque = new Bibliotheque($oeuvres, $adherents);

$joshua = $bibliotheque->getAdherentByName("Joshua");
$elisa = $bibliotheque->getAdherentByName("Elisabeth");
//var_dump($joshua);
echo "**************************".PHP_EOL;
$joshua->emprunter($bibliotheque, "Le Loup");
echo "**************************".PHP_EOL;

$joshua->emprunter($bibliotheque, "Le Loup");
var_dump($joshua->getPret("3002F"));

