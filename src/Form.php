<?php


namespace Ipssi\Evaluation;


abstract class Form extends Element
{
    protected $name;

    public function __construct(string $name, int $positionX, int $positionY, Color $color)
    {
        parent::__construct($positionX, $positionY, $color);
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getPositionX(): int
    {
        return parent::getPositionX();
    }

    public function getPositionY(): int
    {
        return parent::getPositionY();
    }

    public function getColor(): Color
    {
        return parent::getColor();
    }


}