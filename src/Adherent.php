<?php


namespace Ipssi\Evaluation;
use DateInterval;


class Adherent
{
    private $nom;
    private $pret;

    public function __construct(string $nom, array $pret = array())
    {
        $this->nom = $nom;
        $this->pret = $pret;
    }

    public function emprunter(Bibliotheque $bibliotheque, string $souhait)
    {
        foreach ($this->pret as $pret) {
            /** @var Pret $pret */
            if($pret->getFinPret()){
                echo "Vous avez un pret en cour non rendu.".PHP_EOL;
                return;
            }
        }
        foreach ($bibliotheque->getOeuvres() as $oeuvre)
        {
            /** @var Oeuvre $oeuvre */
            if ($oeuvre->getTitre() != $souhait){
                continue;
            }
            if ($oeuvre->isEmprunt())
            {
                continue;
            }
            $date = new \DateTime();
            $this->addPret(new Pret($oeuvre, $date));
            $oeuvre->setEmprunt();
            $titre = $oeuvre->getTitre();
            $ref = $oeuvre->getRef();
            echo "Vous avez emprunter l'oeuvre ref: $ref - titre: $titre.".PHP_EOL;
        }
    }
    public function addPret(Pret $pret)
    {
        array_push($this->pret, $pret);
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    public function getPret($ref)
    {
        foreach($this->pret as $pret){
            /** @var Pret $pret */
            if($pret->getOeuvre()->getRef()== $ref)
            {
                return $pret;
            }
        }
    }

    public function setPret(Array $pret)
    {
        $this->pret = $pret;
    }



}