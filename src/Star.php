<?php


namespace Ipssi\Evaluation;


class Star extends Form
{

    public function __construct(string $name, int $positionX, int $positionY, Color $color)
    {
        parent::__construct($name, $positionX, $positionY, $color);
    }
}