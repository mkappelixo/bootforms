<?php

namespace Galahad\BootForms\Facades;

use Illuminate\Support\Facades\Facade;

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
