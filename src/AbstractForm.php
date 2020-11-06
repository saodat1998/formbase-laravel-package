<?php

namespace Saodat\FormBase;


use Illuminate\Container\Container;
use Saodat\FormBase\Fields\AbstractField;

/**
 * Class FormBase
 * @package Saodat\FormBase\Services
 */
abstract class AbstractForm
{
    /**
     * @var array
     */
    protected $fields = [];

    protected $defaultFieldsAttributes = [];
    /**
     * @var array
     */
    protected static $availableFieldTypes = [
        'text' => 'TextField',
        'email' => 'TextField',
        'url' => 'TextField',
        'tel' => 'TextField',
        'search' => 'TextField',
        'password' => 'TextField',
        'hidden' => 'TextField',
        'number' => 'TextField',
        'color' => 'TextField',
        'range' => 'TextField',
        'time' => 'TextField',
        'week' => 'TextField',
        'textarea' => 'TextareaField',
        'select' => 'SelectField',
        'treeselect' => 'TreeselectField',
        'checkbox' => 'CheckboxField',
        'choice' => 'CheckboxField',
        'radio' => 'RadioField',
        'file' => 'FileField',
        'image' => 'FileField',
        'datetime-local' => 'DateField',
        'month' => 'DateField',
        'date' => 'DateField',
    ];

    public function add(string $field, string $name, string $label, ...$params) : self
    {
        $field = $this->makeField($field, $name, $label, ...$params);

        $this->addField($field);

        return $this;
    }

    public function makeField(string $field, string $name, string $label, ...$params) : AbstractField
    {
        $fieldType = $this->getFieldType($field);

        if (strpos($fieldType, 'TextField')) {
            return new $fieldType($field, $name, $label, ...$params);
        }

        return new $fieldType($name, $label, ...$params);
    }

    public function addField(AbstractField $field) : self
    {
        $this->fields[] = $field;

        if ($this->defaultFieldsAttributes) {
            foreach ($this->fields as $field) {
                $field->setAttributes($this->defaultFieldsAttributes);
            }
        }

        return $this;
    }

    public function getSchema(): array
    {
        $schema = [];

        foreach ($this->fields as $field) {
            $schema[] = $field->getFieldSchema();
        }

        return $schema;
    }

    /**
     * @param string $type
     * @throws \InvalidArgumentException
     * @return string
     */
    public function getFieldType(string $type): string
    {
        $types = array_keys(static::$availableFieldTypes);

        if (!$type || trim($type) == '') {
            throw new \InvalidArgumentException('Field type must be provided.');
        }

        if (!in_array($type, $types)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Unsupported field type [%s]. Available types are: %s',
                    $type,
                    join(', ', $types)
                )
            );
        }

        $namespace = __NAMESPACE__ . '\\Fields\\';

        return $namespace . static::$availableFieldTypes[$type];
    }

    /**
     * @return AbstractField[]
     */
    public function getFields() : array
    {
        return $this->fields;
    }

    public function setDefaultsFieldsAttributes(array $fieldAttributes) : void
    {
        $this->defaultFieldsAttributes = $fieldAttributes;
    }

    public function getDefaultFieldsAttributes() : array
    {
        return $this->defaultFieldsAttributes;
    }
}
