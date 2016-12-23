<?php namespace Taskforcedev\LaravelSupport\Helpers;

class UI
{
    public $bs3;
    public $bs4;
    public $f6;
    public $json;

    public function __construct()
    {
        $this->bs3 = config('taskforce-support.frontend.libraries.bootstrap3');
        $this->bs4 = config('taskforce-support.frontend.libraries.bootstrap4');
        $this->f6  = config('taskforce-support.frontend.libraries.foundation6');
        $this->json = json_decode(file_get_contents(__DIR__ . '/UI/classes.json'));
    }

    public function cssClass($type)
    {
        if ($this->bs3) {
            $framework = $this->json->bs3;
        } elseif ($this->bs4) {
            $framework = $this->json->bs4;
        } elseif ($this->f6) {
            $framework = $this->json->f6;
        } else {
            return '';
        }

        if (property_exists($framework, $type)) {
            return $framework->$type;
        }

        return '';
    }
}
