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
        $framework = $this->getFramework();
        $classes = $this->getClasses($framework);

        if (property_exists($classes, $type)) {
            return $classes->$type;
        }

        return '';
    }

    /**
     * Create framework column class.
     *
     * @param integer $xs Extra Small (Ignored on Foundation
     * @param integer $sm Small.
     * @param integer $md Medium.
     * @param integer $lg Large.
     *
     * @return string
     */
    public function columns($xs, $sm, $md, $lg)
    {
        $framework = $this->getFramework();
        switch ($framework)
        {
            case 'bs3':
            case 'bs4':
                $xsC = $this->cssClass('column_extra_small') . $xs;
                $smC = $this->cssClass('column_small') . $sm;
                $mdC = $this->cssClass('column_medium') . $md;
                $lgC = $this->cssClass('column_large') . $lg;
                return $this->buildClassString([$xsC, $smC, $mdC, $lgC]);
            case 'f6':
                // Build the foundation classes
                $smC = $this->cssClass('column_small') . $sm;
                $mdC = $this->cssClass('column_medium') . $md;
                $lgC = $this->cssClass('column_large') . $lg;
                $columns = $this->cssClass('column');
                // Build the string
                return $this->buildClassString([$columns, $smC, $mdC, $lgC]);
            default:
                return '';
                break;
        }
    }

    /**
     * Get the UI framework name.
     * @return string
     */
    public function getFramework()
    {
        if ($this->bs3) {
            return 'bs3';
        } elseif ($this->bs4) {
            return 'bs4';
        } elseif ($this->f6) {
            return 'f6';
        }
        return '';
    }

    public function getClasses($framework)
    {
        switch ($framework)
        {
            case 'bs3':
                $classes = $this->json->bs3;
                break;
            case 'bs4':
                $classes = $this->json->bs4;
                break;
            case 'f6':
                $classes = $this->json->f6;
                break;
            case '':
            default:
                return '';
        }
        return $classes;
    }

    public function buildClassString($classes = [])
    {
        return join(' ', $classes);
    }
}
