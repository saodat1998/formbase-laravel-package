<?php

namespace Saodat\FormBase\Fields;

use Illuminate\Support\Arr;
use Saodat\FormBase\Contracts\AttributeInterface;

/**
 * Class AbstractField
 * @package Saodat\FormBase\Services\Fields
 */
abstract class AbstractField implements AttributeInterface
{
    /**
     * @var
     */
    protected $component;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @var string
     */
    protected $validationRule;

    /**
     * Default properties
     *
     * @var array
     */
    protected $properties = [
        'name',
        'label',
        'options',
        'value',
        'validationRule',
    ];

    public function __construct(string $name, string $label,  array $options = [])
    {
        $this->name = $name;
        $this->label = $label;
        $this->setParams($options);
    }

    abstract public function getFieldSchema(): array;

    protected function setParams(array $params) : void
    {
        if (!$params) {
            return;
        }

        foreach ($params as $name => $value) {
            if (!property_exists($this, $name)) {
                continue;
            }
            $this->{$name} = $value;
        }
    }

    public function setAttributes(array $attributes)
    {
        if (!$this->attributes) {
            $this->attributes = $attributes;
        }

        $this->attributes += $attributes;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }


    /**
     * @return mixed
     */
    public function getComponent()
    {
        return $this->component;
    }

    /**
     * @return mixed|string
     */
    public function getValidationRule()
    {
        return $this->validationRule;
    }

    /**
     * @param mixed|string $validationRule
     */
    public function setValidationRule(string $validationRule)
    {
        $this->validationRule = $validationRule;
    }

    public function getCommonFields(): array
    {
        $fieldSchema['component'] = $this->component;
        $fieldSchema['name'] = $this->name;
        $fieldSchema['label'] = $this->label;
        $fieldSchema['value'] = $this->value;
        $fieldSchema['rule'] = $this->validationRule;
        $fieldSchema['attributes'] = $this->attributes;

        return $fieldSchema;
    }
}

