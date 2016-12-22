<?php namespace Taskforcedev\LaravelSupport\Helpers;

class Composer
{
    public $vendorFolder;

    public function __construct()
    {
        // helpers . / src / laravel-support / taskforcedev / vendor.
        $this->vendorFolder = __DIR__ . '/../../../../';
    }

    /**
     * Determine if a composer package exists.
     *
     * @param string $namespace Package namespace.
     * @param string $package   Package name.
     *
     * @return bool
     */
    public function packageExists($namespace, $package)
    {
        $folder = $this->vendorFolder . $namespace;
        $folderExists = file_exists($folder);

        if (!$folderExists) {
            return false;
        }

        $packageFolder = $folder . '/' . $package;
        $packageFolderExists = file_exists($packageFolder);

        return $packageFolderExists;
    }
}
