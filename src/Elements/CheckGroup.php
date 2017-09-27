<?php

namespace Galahad\BootForms\Elements;

use Galahad\Forms\Elements\Label;

class CheckGroup extends FormGroup
{
    /** @var \Galahad\Forms\Elements\Label */
    protected $label;

    /** @var bool */
    protected $inline = false;

    /**
     * Constructor
     *
     * @param \Galahad\Forms\Elements\Label $label
     */
    public function __construct(Label $label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function render()
    {
        if ($this->inline === true) {
            return $this->label->render();
        }

        $html = '<div';
        $html .= $this->renderAttributes();
        $html .= '>';
        $html .= $this->label;
        $html .= $this->renderHelpBlock();

        $html .= '</div>';

        return $html;
    }

    /**
     * @return $this
     */
    public function inline()
    {
        $this->inline = true;

        $class = $this->control()->getAttribute('type').'-inline';
        $this->label->removeClass('control-label')->addClass($class);

        return $this;
    }

    /**
     * @return \Galahad\Forms\Elements\Element
     */
    public function control()
    {
        return $this->label->getControl();
    }

    /**
     * @param $method
     * @param $parameters
     * @return $this
     */
    public function __call($method, $parameters)
    {
        call_user_func_array([$this->label->getControl(), $method], $parameters);

        return $this;
    }
}
