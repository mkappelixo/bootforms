<?php

namespace Galahad\BootForms\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \AdamWathan\Form\FormBuilder
 * @mixin \Galahad\BootForms\BasicFormBuilder
 * @mixin \Galahad\BootForms\HorizontalFormBuilder
 */
class BootForm extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bootform';
    }
}
