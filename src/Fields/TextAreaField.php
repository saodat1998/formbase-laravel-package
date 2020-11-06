<?php


namespace Saodat\FormBase\Fields;

use Saodat\FormBase\Contracts\PlaceholderInterface;

/**
 * Class TextAreaField
 * @package Saodat\FormBase\Services\Fields
 */
class TextAreaField extends AbstractField implements PlaceholderInterface
{
    /**
     * @var string
     */
    protected $component = 'textarea';

    /**
     * @var string
     */
    protected $placeholder;

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
     * @return string
     */
    public function getPlaceholder(): string
    {
        return $this->placeholder;
    }

    /**
     * @return array
     */
    public function getFieldSchema(): array
    {
        $fieldSchema = $this->getCommonFields();
        $fieldSchema['placeholder'] = $this->placeholder;

        return $fieldSchema;
    }

}
