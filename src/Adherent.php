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

    public function emprunter(Bibliotheque $bibliotheque, string $souhait, \DateTime $date = null)
    {
        $none = true;
        if ($date == null)
        {
            $date = new \DateTime();
        }
        //Verifie si l'adhérent à un emprunt expiré
        foreach ($this->pret as $pret) {
            /** @var Pret $pret */
            if($pret->getFinPret()){
                echo "Vous avez un pret en cour non rendu.".PHP_EOL;
                return;
            }
        }
        //Vérifie dans la bibliotheque si l'ouvre souhaiter est disponible, et emprunte si c'est le cas
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
            //Emprunt l'oeuvre souhaitee

            $this->addPret(new Pret($oeuvre, $date));
            $oeuvre->setEmprunt();
            $titre = $oeuvre->getTitre();
            $ref = $oeuvre->getRef();
            $nom = $this->nom;
            $dateformat = $date->format('d-m-Y');
            $none = false;
            echo "$nom a emprunté l'oeuvre ref: $ref - titre: $titre - date: $dateformat".PHP_EOL;
            return;
        }
        if ($none){
            echo "Aucune oeuvre disponible ayant le titre : $souhait.".PHP_EOL;
        }
    }

    public function rendre(Bibliotheque $bibliotheque, string $ref)
    {
        if($this->getPretByRef($ref) != null)
        {
            $bibliotheque->getOeuvreByRef($ref)->setEmprunt();
            $this->deletePret($ref);
            $nom = $this->nom;
            echo "$nom rend l'oeuvre de la référence: $ref.".PHP_EOL;
            return;
        }
        echo "Aucune oeuvre trouvé à cette référence.".PHP_EOL;
    }

    public function addPret(Pret $pret)
    {
        array_push($this->pret, $pret);
    }

    public function deletePret(string $ref)
    {
        foreach ($this->pret as $key => $pret)
        {
            /**@var Pret $pret*/
            if ($pret->getOeuvre()->getRef() == $ref){
                unset($this->pret[$key]);
            }
        }
    }
    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    public function getPretByRef($ref)
    {
        foreach($this->pret as $pret){
            /** @var Pret $pret */
            if($pret->getOeuvre()->getRef() == $ref)
            {
                return $pret;
            }
        }

    }

    public function getPret(): array
    {
        return $this->pret;
    }


    public function setPret(Array $pret)
    {
        $this->pret = $pret;
    }



}