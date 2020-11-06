<?php


namespace Saodat\FormBase\Contracts;

use Saodat\FormBase\Fields\AbstractField;

/**
 * Interface FieldManager
 * @package Saodat\FormBase\Services\Contracts
 */
interface FormBuilderInterface
{
    public function add(string $field, string $name, string $label, ...$params);

    public function makeField(string $field, string $name, string $label, ...$params);

    public function addField(AbstractField $field);

    public function getFieldType(string $type);

    public function getSchema() : array;
}
