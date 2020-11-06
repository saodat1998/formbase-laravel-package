<?php


namespace Saodat\FormBase\Fields;


use Saodat\FormBase\Contracts\OptionsInterface;

class TreeselectField extends AbstractField implements OptionsInterface
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

    public function getOptions(): array
    {
        return $this->options;
    }


    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    public function getFieldSchema(): array
    {
        $fieldSchema = $this->getCommonFields();
        $fieldSchema['options'] = $this->options;

        return $fieldSchema;
    }
}
