<?php

namespace Taskforcedev\LaravelSupport\Facades;

use Illuminate\Support\Facades\Facade;

class Composer extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'composer'; }
}