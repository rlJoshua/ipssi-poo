<?php


namespace Ipssi\Evaluation;


use DateInterval;

class Pret
{
    private $oeuvre;
    private $date;


    public function __construct(Oeuvre $oeuvre, \DateTimeInterface $date)
    {
        $this->oeuvre = $oeuvre;
        $this->date = $date;
    }

    public function getDateLimit(): \DateTimeInterface
    {
        return $this->date->add(new DateInterval('P14D'));
    }

    public function getFinPret(): bool
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


    public function getOeuvre(): Oeuvre
    {
        return $this->oeuvre;
    }


    public function setOeuvre(Oeuvre $oeuvre)
    {
        $this->oeuvre = $oeuvre;
    }


    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date)
    {
        $this->date = $date;
    }




}