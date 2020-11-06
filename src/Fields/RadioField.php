<?php


namespace Saodat\FormBase\Fields;

use Saodat\FormBase\Contracts\OptionsInterface;

/**
 * Class RadioField
 * @package Saodat\FormBase\Services\Fields
 */
class RadioField extends AbstractField implements OptionsInterface
{
    /**
     * @var string
     */
    protected $component = 'radio';

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
        'value',
    ];

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
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

    public function setOptions(array $options)
    {
        // TODO: Implement setOptions() method.
    }
}
