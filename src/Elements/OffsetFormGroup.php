<?php

namespace Galahad\BootForms\Elements;

class OffsetFormGroup
{
    /** @var \Galahad\Forms\Elements\Element */
    protected $control;

    /** @var array */
    protected $columnSizes;

    /**
     * @param \Galahad\Forms\Elements\Element|GroupWrapper $control
     * @param array $columnSizes
     */
    public function __construct($control, $columnSizes)
    {
        $this->control = $control;
        $this->columnSizes = $columnSizes;
    }

    /**
     * @param array $columnSizes
     * @return $this
     */
    public function setColumnSizes($columnSizes)
    {
        $this->columnSizes = $columnSizes;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return string
     */
    public function render()
    {
        $html = '<div class="form-group">';
        $html .= '<div class="'.$this->getControlClass().'">';
        $html .= $this->control;
        $html .= '</div>';

        $html .= '</div>';

        return $html;
    }

    /**
     * @param string $method
     * @param array $parameters
     * @return $this
     */
    public function __call($method, $parameters)
    {
        call_user_func_array([$this->control, $method], $parameters);

        return $this;
    }

    /**
     * @return string
     */
    protected function getControlClass()
    {
        $class = '';
        foreach ($this->columnSizes as $breakpoint => $sizes) {
            $class .= sprintf('col-%s-offset-%s col-%s-%s ', $breakpoint, $sizes[0], $breakpoint, $sizes[1]);
        }

        return trim($class);
    }
}
