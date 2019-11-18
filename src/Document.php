<?php


namespace Ipssi\Evaluation;


class Document
{
    private $name;
    private $color;
    private $elements;

    public function __construct(string $name, Color $color, array $elements = array())
    {
        $this->name = $name;
        $this->color = $color;
        $this->elements = $elements;
    }

    public function compteRendu()
    {
        $name = $this->name;
        $red = $this->getColor()->getRed();
        $green = $this->getColor()->getGreen();
        $blue = $this->getColor()->getBlue();
        echo PHP_EOL."Document: $name - Couleur RGB($red, $green, $blue)".PHP_EOL;

        foreach ($this->elements as $element){

            if($element instanceof Texte){
                $text = $element->getValue();
                $red = $element->getColor()->getRed();
                $green = $element->getColor()->getGreen();
                $blue = $element->getColor()->getBlue();
                $positionX = $element->getPositionX();
                $positionY = $element->getPositionY();
                echo PHP_EOL."Texte: $text - Couleur RGB($red , $green, $blue)".PHP_EOL;
                echo "Position X: $positionX - Position Y: $positionY".PHP_EOL;
            }

            if($element instanceof Form){
                $name = $element->getName();
                $red = $element->getColor()->getRed();
                $green = $element->getColor()->getGreen();
                $blue = $element->getColor()->getBlue();
                $positionX = $element->getPositionX();
                $positionY = $element->getPositionY();
                echo PHP_EOL."Forme: $name - Couleur RGB($red , $green, $blue)".PHP_EOL;
                echo "Position X: $positionX - Position Y: $positionY".PHP_EOL;
            }

            if($element instanceof Image){
                $name = $element->getName();
                $positionX = $element->getPositionX();
                $positionY = $element->getPositionY();
                echo PHP_EOL."Image: $name - Position X: $positionX - Position Y: $positionY".PHP_EOL;
            }
        }
    }
    public function getElements()
    {
        return $this->elements;
    }

    public function addElement(Element $element)
    {
        array_push($this->elements, $element);
    }

    public function removeElement(Element $element){
        foreach ($this->elements as $key => $el){
            if($el === $element){
                unset($this->elements[$key]);
            }
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getColor(): Color
    {
        return $this->color;
    }

    public function setColor(Color $color)
    {
        $this->color = $color;
    }




}