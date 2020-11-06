<?php
namespace Saodat\FormBase\Fields;

use Saodat\FormBase\Contracts\OptionsInterface;

/**
 * Class CheckboxField
 * @package Saodat\FormBase\Services\Fields
 */
class CheckboxField extends AbstractField implements OptionsInterface
{
    /**
     * @var string
     */
    protected $component = 'checkbox';

    /**
     * @var
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
