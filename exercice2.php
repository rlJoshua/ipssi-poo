<?php

use Ipssi\Evaluation\Color;
use Ipssi\Evaluation\Document;
use Ipssi\Evaluation\Form;
use Ipssi\Evaluation\Texte;
use Ipssi\Evaluation\Image;

require_once('vendor/autoload.php');

$document = new Document("Document", new Color(25, 88, 130));
$document->addElement(new Texte("Titre du Document", 50, 35, new Color(0, 0, 0)));
$document->addElement(new Form("Rectangle", 25, 25, new Color(25, 60, 203)));
$document->addElement(new Form("Croix", 50, 75, new Color(100, 0, 0)));
$document->addElement(new Image("ImageDocteur", 50, 100, new Color(100, 100, 100)));
$document->compteRendu();