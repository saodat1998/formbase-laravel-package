<?php

namespace Saodat\FormBase;


use Illuminate\Container\Container;
use Saodat\FormBase\Fields\AbstractField;

/**
 * Class FormBase
 * @package Saodat\FormBase\Services
 */
abstract class FormBase
{
    /**
     * @var array
     */
    public $fields = [];

    /**
     * @var
     */
    protected $fieldType;

    /**
     * @var AbstractField
     */
    protected $addedField;

    /**
     * @var Container
     */
    protected $container;
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


    /**
     * FormBase constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function addField()
    {
        $parameters = func_get_args();
        $fieldType = $parameters[0];

        $this->fieldType = $this->getFieldType($fieldType);

        if (!strpos($this->fieldType, 'TextField')) {
            array_shift($parameters);
        }

        $this->addedField = $this->container->make($this->fieldType);
        $this->addedField->addParams($parameters);
        $this->fields[] = $this->addedField;

        return $this;
    }

    /**
     * @param array $attributes
     * @return $this|mixed
     */
    public function setAttributes($attributes = [])
    {
        $this->addedField = array_pop($this->fields);
        $this->addedField->setAttributes($attributes);

        $this->fields[] = $this->addedField;

        return $this;
    }

    public function setValidationRule($validationRule = '')
    {
        $this->addedField = array_pop($this->fields);
        $this->addedField->setValidationRule($validationRule);

        $this->fields[] = $this->addedField;

        return $this;
    }

    /**
     * @return array
     */
    public function all()
    {
        return ['fields' => $this->fields];
    }

    /**
     * @return $this
     */
    public function get()
    {
        $this->fields[] = $this->addedField->getFieldSchema();
        return $this;
    }

    public function getSchema(): array
    {
        return $this->addedField->getFieldSchema();
    }

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
}
