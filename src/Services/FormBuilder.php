<?php
namespace Saodat\FormBase\Services;

use Saodat\FormBase\FormBase;
use Saodat\FormBase\Contracts\FormBuilderContract;

class FormBuilder extends FormBase implements FormBuilderContract
{

    /**
     * @param array $attributes
     * @return mixed|FormBase
     */
    public function setAttributes($attributes = [])
    {
        return parent::setAttributes($attributes);
    }

    /**
     * @param string $validationRule
     * @return mixed|FormBase
     */
    public function setValidationRule($validationRule = '')
    {
        return parent::setValidationRule($validationRule);
    }

    public function getOne()
    {
        // TODO: Implement getOne() method.
    }

    public function get()
    {
        // TODO: Implement get() method.
    }

    public function all()
    {
        // TODO: Implement all() method.
    }
}
