<?php


namespace Ipssi\Evaluation;


class Bibliotheque
{
    private $oeuvres;
    private $adherents;

    public function __construct(array $oeuvres, array $adherents)
    {
        $this->oeuvres = $oeuvres;
        $this->adherents = $adherents;
    }

    public function addAdherents(string $nom)
    {
        $adherent = new Adherent($nom);
        array_push($this->adherents, $adherent);
    }

    public function getAdherentByName(string $nom)
    {
        foreach ($this->adherents as $adherent){
            /** @var Adherent $adherent */
            if ($adherent->getNom() == $nom){
                return $adherent;
            }
        }
        echo "Aucun Adhérent trouvé !";
    }

    public function getOeuvreByName(string $titre)
    {
        foreach ($this->oeuvres as $oeuvre){
            /** @var Oeuvre $oeuvre */
            if ($oeuvre->getTitre() == $titre){
                return $oeuvre;
            }
        }
        echo "Aucune Oeuvre trouvé !";
    }

    public function getOeuvreByRef(string $ref){
        foreach ($this->oeuvres as $oeuvre){
            /** @var Oeuvre $oeuvre */
            if ($oeuvre->getRef() == $ref){
                return $oeuvre;
            }
        }
        echo "Aucune Oeuvre trouvé !";
    }

    public function getOeuvres(): array
    {
        return $this->oeuvres;
    }


    public function setOeuvres(array $oeuvres)
    {
        $this->oeuvres = $oeuvres;
    }


    public function getAdherents(): array
    {
        return $this->adherents;
    }

    public function setAdherents(array $adherents)
    {
        $this->adherents = $adherents;
    }




}