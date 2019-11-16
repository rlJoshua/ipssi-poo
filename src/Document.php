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

    public function addElement(Element $element){
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