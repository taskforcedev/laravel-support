<?php namespace Taskforcedev\LaravelSupport\Helpers;

class UI
{
    public $bs3;
    public $bs4;
    public $f6;

    public function __construct()
    {
        $this->bs3 = config('taskforce-support.frontend.libraries.bootstrap3');
        $this->bs4 = config('taskforce-support.frontend.libraries.bootstrap3');
        $this->f6  = config('taskforce-support.frontend.libraries.foundation6');
    }

    public function getInputClasses()
    {
        $classes = '';

        if ($this->bs3 || $this->bs4) {
            // Bootstrap 3/4
            $classes = 'form-control';
        } elseif ($this->f6) {
            // Foundation 6
        }

        return $classes;
    }
}
