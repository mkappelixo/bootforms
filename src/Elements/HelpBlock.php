<?php

namespace Galahad\BootForms\Elements;

use Galahad\Forms\Elements\Element;

class HelpBlock extends Element
{
    /** @var string */
    protected $message;

    /**
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
        $this->addClass('help-block');
    }

    /**
     * @param $message
     * @return $this
     */
    public function message($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function render()
    {
        $html = '<p';
        $html .= $this->renderAttributes();
        $html .= '>';
        $html .= $this->message;
        $html .= '</p>';

        return $html;
    }
}
