<?php

use Ipssi\Evaluation\Color;
use Ipssi\Evaluation\Document;
use Ipssi\Evaluation\Star;
use Ipssi\Evaluation\Cloud;
use Ipssi\Evaluation\Texte;
use Ipssi\Evaluation\Image;

require_once('vendor/autoload.php');

$document = new Document("Document", new Color(25, 88, 130));
$document->addElement(new Texte("Titre du Document", 50, 35, new Color(0, 0, 0)));
$document->addElement(new Star("Etoile", 15, 25, new Color(25, 60, 203)));
$document->addElement(new Cloud("Nuage", 45, 25, new Color(255, 255, 255)));
$document->addElement(new Image("Image", 25, 75));
$document->compteRendu();