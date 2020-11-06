<?php


namespace Saodat\FormBase\Contracts;


interface AttributeInterface
{
    public function setAttributes(array $array);

    public function getAttributes() : array;
}
