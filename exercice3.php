<?php

use Ipssi\Evaluation\Adherent;
use Ipssi\Evaluation\Bibliotheque;
use Ipssi\Evaluation\Oeuvre;
use Ipssi\Evaluation\Pret;

require_once('vendor/autoload.php');

$bibliotheque = new Bibliotheque();

//AJout des Oeuvres
$bibliotheque->addOeuvre("3000F", "Le loup");
$bibliotheque->addOeuvre("3001F", "Le loup");
$bibliotheque->addOeuvre("3002F", "Le loup");
$bibliotheque->addOeuvre("5001F", "La chèvre");
$bibliotheque->addOeuvre("5002F", "La chèvre");
$bibliotheque->addOeuvre("5003F", "La chèvre");
$bibliotheque->addOeuvre("5004F", "La chèvre");

//AJout des Adherents
$bibliotheque->addAdherents("Joshua");
$bibliotheque->addAdherents("Mathis");
$bibliotheque->addAdherents("David");
$bibliotheque->addAdherents("Melanie");
$bibliotheque->addAdherents("Elisa");

//Recuperation des adherents dans une variable chacune
$joshua = $bibliotheque->getAdherentByName("Joshua");
$mathis = $bibliotheque->getAdherentByName("Mathis");
$david = $bibliotheque->getAdherentByName("David");
$melanie = $bibliotheque->getAdherentByName("Melanie");
$elisa = $bibliotheque->getAdherentByName("Elisa");

//Les adherents font des emprunts
echo PHP_EOL."Mathis souhaite emprunté l'oeuvre Le loup.".PHP_EOL;
$mathis->emprunter($bibliotheque, "Le loup", new DateTime("2019-11-01"));

echo PHP_EOL."Mathis souhaite emprunté l'oeuvre La chèvre.".PHP_EOL;
$mathis->emprunter($bibliotheque, "La chèvre");

echo PHP_EOL."David souhaite emprunté l'oeuvre Le lion.".PHP_EOL;
$david->emprunter($bibliotheque, "Le lion");

echo PHP_EOL."David souhaite emprunté l'oeuvre La chevre.".PHP_EOL;
$david->emprunter($bibliotheque, "La chèvre");

echo PHP_EOL."Melanie souhaite emprunté l'oeuvre La chevre.".PHP_EOL;
$melanie->emprunter($bibliotheque, "La chèvre");

echo PHP_EOL."Elisa souhaite emprunté l'oeuvre Le loup & La chevre.".PHP_EOL;
$elisa->emprunter($bibliotheque, "Le loup");
$elisa->emprunter($bibliotheque, "La chèvre");

echo PHP_EOL."Joshua souhaite emprunté l'oeuvre Le loup".PHP_EOL;
$joshua->emprunter($bibliotheque, "Le loup", new DateTime('2019-10-22'));

echo PHP_EOL."Joshua souhaite emprunté l'oeuvre La chevre.".PHP_EOL;
$joshua->emprunter($bibliotheque, "La chèvre");

echo PHP_EOL."Joshua souhaite rendre l'oeuvre Le loup.".PHP_EOL;
$joshua->rendre($bibliotheque, "3002F");

echo PHP_EOL."David souhaite emprunté l'oeuvre Le loup.".PHP_EOL;
$david->emprunter($bibliotheque, "Le loup");

echo PHP_EOL."Mathis souhaite rendre l'oeuvre Le loup.".PHP_EOL;
$mathis->rendre($bibliotheque, "3000F");


