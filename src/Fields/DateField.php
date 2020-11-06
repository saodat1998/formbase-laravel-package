<?php


namespace Saodat\FormBase\Fields;

class DateField extends AbstractField
{

    protected $component = 'date';

    public function __construct(string $name, string $label = '', $attributes = [], $value = null,  $validationRule = '')
    {
        parent::__construct( $name,  $label, $value, $attributes, $validationRule);
    }

    public function getFieldSchema(): array
    {
        return $this->getCommonFields();
    }

}
