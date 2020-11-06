<?php
namespace Saodat\FormBase\Contracts;

interface OptionsInterface {

    /**
     * @return array
     */
    public function getOptions(): array;

    public function setOptions(array $options);
}
