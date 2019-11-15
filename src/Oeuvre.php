<?php


namespace Ipssi\Evaluation;



class Oeuvre
{
    private $ref;
    private $titre;
    private $emprunt;


    public function __construct(string $ref, string $titre, bool $emprunt = false)
    {
        $this->ref = $ref;
        $this->titre = $titre;
        if ($emprunt){
            $this->setEmprunt();
        }else{
            $this->emprunt = $emprunt;
        }
    }

    public function getRef()
    {
        return $this->ref;
    }


    public function setRef($ref)
    {
        $this->ref = $ref;
    }


    public function getTitre()
    {
        return $this->titre;
    }


    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function isEmprunt(): bool
    {
        return $this->emprunt;
    }

    public function setEmprunt()
    {
        $this->emprunt = !$this->emprunt;
        if ($this->emprunt){
            $this->date = (new \DateTime())->format("d-m-Y");
        }
        if (!$this->emprunt){
            $this->date = null;
        }
    }


}