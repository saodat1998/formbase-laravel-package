<?php


namespace Saodat\FormBase\Contracts;

/**
 * Interface FieldManager
 * @package Saodat\FormBase\Services\Contracts
 */
interface FormBuilderContract
{
    public function setAttributes(array $attributes);

    public function setValidationRule(string $validationRule);

    public function addField();

    public function getFieldType(string $type);
}
