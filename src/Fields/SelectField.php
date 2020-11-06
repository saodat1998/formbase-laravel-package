<?php

namespace Saodat\FormBase\Fields;

use Saodat\FormBase\Contracts\OptionsInterface;

/**
 * Class SelectField
 * @package Saodat\FormBase\Services\Fields
 */
class SelectField extends AbstractField implements OptionsInterface
{
    /**
     * @var string
     */
    protected $component = 'select';

    /**
     * @var array
     */
    protected $options;

    /**
     * @var array
     */
    protected $properties = [
        'name',
        'label',
        'options',
        'attributes',
        'validationRule',
        'value'
    ];

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * @return array
     */
    public function getFieldSchema(): array
    {
        $fieldSchema = $this->getCommonFields();
        $fieldSchema['options'] = $this->options;

        return $fieldSchema;
    }
}
