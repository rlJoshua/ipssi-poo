<?php


namespace Ipssi\Evaluation\Exception;


class InvalidIndexException extends InvalidDataException
{
    public function __construct(string $index)
    {
        parent::__construct($index, 'index', "Int");
    }
}