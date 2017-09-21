<?php

namespace Galahad\BootForms\Elements;

use AdamWathan\Form\Elements\Element;
use AdamWathan\Form\Elements\Label;

class FormGroup extends Element
{
    /** @var \AdamWathan\Form\Elements\Label */
    protected $label;

    /** @var \AdamWathan\Form\Elements\Element */
    protected $control;

    /** @var HelpBlock */
    protected $helpBlock;

    /**
     * Constructor
     *
     * @param \AdamWathan\Form\Elements\Label $label
     * @param \AdamWathan\Form\Elements\Element $control
     */
    public function __construct(Label $label, Element $control)
    {
        $this->label = $label;
        $this->control = $control;
        $this->addClass('form-group');
    }

    /**
     * @return string
     */
    public function render()
    {
        $html = '<div';
        $html .= $this->renderAttributes();
        $html .= '>';
        $html .= $this->label;
        $html .= $this->control;
        $html .= $this->renderHelpBlock();

        $html .= '</div>';

        return $html;
    }

    /**
     * @param $text
     * @return $this
     */
    public function helpBlock($text)
    {
        if (null === $this->helpBlock) {
            $this->helpBlock = new HelpBlock($text);
        }

        return $this;
    }

    /**
     * @return \AdamWathan\Form\Elements\Element
     */
    public function control()
    {
        return $this->control;
    }

    /**
     * @return Label
     */
    public function label()
    {
        return $this->label;
    }

    /**
     * @param $method
     * @param $parameters
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
    protected function renderHelpBlock()
    {
        if ($this->helpBlock) {
            return $this->helpBlock->render();
        }

        return '';
    }
}
