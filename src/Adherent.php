<?php


namespace Ipssi\Evaluation;
use Couchbase\PrefixSearchQuery;
use DateInterval;


class Adherent
{
    private $nom;
    private $pret;
    private $date;

    public function __construct(string $nom, array $pret = null)
    {
        $this->nom = $nom;
        $this->pret = $pret;
    }

    public function emprunter(Bibliotheque $bibliotheque, string $souhait)
    {
        foreach ($this->pret as $pret) {
            if($this->getFinPret($pret)){
                $bibliotheque->getOeuvreByRef($pret->getRef());
                $this->pret = null;
            }
            else
            {
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

            $this->setPret($oeuvre);
            $oeuvre->setEmprunt();
            $titre = $oeuvre->getTitre();
            $ref = $oeuvre->getRef();
            echo "Vous avez emprunter l'oeuvre ref: $ref - titre: $titre.".PHP_EOL;
        }
    }

    public function getDateLimit(): \DateTimeInterface
    {
        /** @var \DateTime $date */
        $date = $this->date;
        return $date->add(new DateInterval('P14D'));
    }

    public function getFinPret(Oeuvre $oeuvre): bool
    {
        if ($this->getDateLimit() >= new \DateTime()){
            $res = true;
        }
        else
        {
            $res = true;
        }
        return $res;
    }

    public function getNom(): string
    {
        return $this->nom;
    }


    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    public function getPret()
    {
        return $this->pret;
    }

    public function setPret(Oeuvre $pret)
    {
        $this->pret = $pret;
    }



}