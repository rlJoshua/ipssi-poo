<?php


namespace Ipssi\Evaluation;


abstract class Element
{
    protected $positionX;
    protected $positionY;
    protected $color;

    public function __construct(int $positionX, int $positionY, Color $color = null)
    {
        $this->positionX = $positionX;
        $this->positionY = $positionY;
        $this->color = $color;
    }

    public function getPositionX(): int
    {
        return $this->positionX;
    }

    public function getPositionY(): int
    {
        return $this->positionY;
    }

    public function getColor(): Color
    {
        return $this->color;
    }






}