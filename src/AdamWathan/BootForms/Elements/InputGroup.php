<?php

namespace Galahad\BootForms\Elements;

use AdamWathan\Form\Elements\Text;

class InputGroup extends Text
{
    /** @var string[] */
    protected $beforeAddon = [];

    /** @var string[] */
    protected $afterAddon = [];

    /**
     * @param string $addon
     * @return $this
     */
    public function beforeAddon($addon)
    {
        $this->beforeAddon[] = $addon;

        return $this;
    }

    /**
     * @param string $addon
     * @return $this
     */
    public function afterAddon($addon)
    {
        $this->afterAddon[] = $addon;

        return $this;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function type($type)
    {
        $this->attributes['type'] = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function render()
    {
        $html = '<div class="input-group">';
        $html .= $this->renderAddons($this->beforeAddon);
        $html .= parent::render();
        $html .= $this->renderAddons($this->afterAddon);
        $html .= '</div>';

        return $html;
    }

    /**
     * @param string[] $addons
     * @return string
     */
    protected function renderAddons($addons)
    {
        $html = '';

        foreach ($addons as $addon) {
            $html .= '<span class="input-group-addon">';
            $html .= $addon;
            $html .= '</span>';
        }

        return $html;
    }
}
