<?php


namespace Ipssi\Evaluation;


class Cloud extends Form
{
    public function __construct(string $name, int $positionX, int $positionY, Color $color)
    {
        parent::__construct($name, $positionX, $positionY, $color);
    }

}