<?php


namespace Ipssi\Evaluation;


class Texte extends Element
{
    private $value;

    public function __construct(string $value, int $positionX, int $positionY, Color $color)
    {
        parent::__construct($positionX, $positionY, $color);
        $this->value = $value;
    }

    public function setValue(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getPositionX(): int
    {
        return parent::getPositionX();
    }

    public function getPositionY(): int
    {
        return parent::getPositionY(); //
    }

    public function getColor(): Color
    {
        return parent::getColor();
    }


}