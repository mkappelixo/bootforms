<?php

namespace Galahad\BootForms;

use Galahad\BootForms\Elements\FormOpen;

/**
 * @mixin \Galahad\BootForms\BasicFormBuilder
 * @mixin \Galahad\BootForms\HorizontalFormBuilder
 * @mixin \Galahad\Forms\FormBuilder
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
     * @return \Galahad\Forms\Elements\FormOpen
     */
    public function open($action = null)
    {
        $this->builder = $this->basicFormBuilder;

        $open =  $this->builder->open();

        if ($action) {
            $open->action($action);
        }

        return $open;
    }

    /**
     * @param $columnSizes
     * @return \Galahad\Forms\Elements\FormOpen
     */
    public function openHorizontal($columnSizes, $action = null)
    {
        $this->horizontalFormBuilder->setColumnSizes($columnSizes);
        $this->builder = $this->horizontalFormBuilder;

        return $this->builder->open($action);
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
