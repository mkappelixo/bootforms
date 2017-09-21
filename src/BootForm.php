<?php

namespace Galahad\BootForms;

/**
 * @mixin \AdamWathan\Form\FormBuilder
 * @mixin \Galahad\BootForms\BasicFormBuilder
 * @mixin \Galahad\BootForms\HorizontalFormBuilder
 */
class BootForm
{
    /** @var BasicFormBuilder|HorizontalFormBuilder */
    protected $builder;

    /** @var BasicFormBuilder */
    protected $basicFormBuilder;

    /** @var HorizontalFormBuilder */
    protected $horizontalFormBuilder;

    /**
     * @param BasicFormBuilder $basicFormBuilder
     * @param HorizontalFormBuilder $horizontalFormBuilder
     */
    public function __construct(BasicFormBuilder $basicFormBuilder, HorizontalFormBuilder $horizontalFormBuilder)
    {
        $this->basicFormBuilder = $basicFormBuilder;
        $this->horizontalFormBuilder = $horizontalFormBuilder;
    }

    /**
     * @return \AdamWathan\Form\Elements\FormOpen
     */
    public function open()
    {
        $this->builder = $this->basicFormBuilder;

        return $this->builder->open();
    }

    /**
     * @param $columnSizes
     * @return \AdamWathan\Form\Elements\FormOpen
     */
    public function openHorizontal($columnSizes)
    {
        $this->horizontalFormBuilder->setColumnSizes($columnSizes);
        $this->builder = $this->horizontalFormBuilder;

        return $this->builder->open();
    }

    /**
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->builder, $method], $parameters);
    }
}
