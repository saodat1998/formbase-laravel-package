<?php

namespace Saodat\FormBase\Fields;

use Saodat\FormBase\Contracts\TypeInterfaces;

/**
 * Class TextField
 * @package Saodat\FormBase\Services\Fields
 */
class TextField extends AbstractField implements TypeInterfaces
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $component = 'text';

    /**
     * @var string
     */
    protected $placeholder;

    /**
     * @var array
     */
    protected $availableTypes = [
        'text',
        'email',
        'url',
        'tel',
        'search',
        'password',
        'hidden',
        'number',
        'color',
        'range',
        'time',
        'week'
    ];

    public function __construct(string $type, string $name, string $label, array $options = [])
    {
        $this->type = $type;
        parent::__construct($name, $label, $options);
    }

    /**
     * @param $type
     * @return bool
     */
    public function validateType($type): bool
    {
        if (!$type || trim($type) == '') {
            throw new \InvalidArgumentException('Field type must be provided.');
        }

        if (!in_array($type, $this->availableTypes)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Unsupported field type [%s]. Available types are: %s',
                    $type,
                    join(', ', $this->availableTypes)
                )
            );
        }
        return true;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getFieldSchema(): array
    {
        $fieldSchema = $this->getCommonFields();
        $fieldSchema['type'] = $this->type;
        $fieldSchema['placeholder'] = $this->placeholder;

        return $fieldSchema;
    }
}
