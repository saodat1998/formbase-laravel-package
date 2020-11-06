<?php


namespace Saodat\FormBase\Fields;


use Saodat\FormBase\Fields\Contracts\GetOptions;

class TreeselectField extends AbstractField implements GetOptions
{
    /**
     * @var string
     */
    protected $component = 'treeselect';

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
}
