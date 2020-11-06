<?php


namespace Saodat\FormBase\Services\Fields;

/**
 * Class TextAreaField
 * @package Saodat\FormBase\Services\Fields
 */
class DateField extends AbstractField
{
    /**
     * @var string
     */
    protected $component = 'date';

    /**
     * @var array
     */
    protected $properties = [
        'name',
        'label',
        'attributes',
        'validationRule',
        'value',
    ];


    /**
     * @return array
     */
    public function getFieldSchema(): array
    {
        return $this->getCommonFields();
    }

}
