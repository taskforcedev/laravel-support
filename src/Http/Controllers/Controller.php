<?php namespace Taskforcedev\LaravelSupport\Http\Controllers;

use Illuminate\Routing\Controller as IlluminateController;
use Illuminate\Console\AppNamespaceDetectorTrait;

class Controller extends IlluminateController
{
    use AppNamespaceDetectorTrait;

    /**
     * Populates $data object for use in controlers.
     */
    protected function buildData()
    {
        return [
            'layout' => $this->getLayout(),
            'isAdmin' => $this->canAdministrate(),
            'sitename' => $this->getSitename(),
        ];
    }

    /**
     * Get the view layout from config.
     */
    public function getLayout()
    {
        return config('taskforce-support.views.layout');
    }

    /**
     * Retrieve authenticated user or a guest user object.
     * @return object User Object.
     */
    public function getUser()
    {
        return (Auth::check() ? \Auth::user() : $this->guest());
    }

    /**
     * Get the sitename from config.
     */
    public function getSitename()
    {
        return config('taskforce-support.sitename');
    }

    /**
     * Guest user object, uses main apps user model (if available)
     * in order to provide all required methods.
     */
    private function guest()
    {
        /* Get the namespace */
        $model = $this->getUserModel();
        if ($model) {
            $guest = new $model();
            $guest->name = 'Guest';
            $guest->email = 'guest@example.com';
        } else {
            $guest = (object)['name' => 'Guest', 'email' => 'guest@example.com'];
        }
        return $guest;
    }

    /**
     * Uses common conventions to attempt to authorize the user for admin actions.
     * @return bool
     */
    protected function canAdministrate()
    {
        $user = $this->getUser();
        if ($user->name == 'Guest' && $user->email == 'guest@example.com') {
            return false;
        }
        if (method_exists($user, 'isAdmin')) {
            return $user->isAdmin();
        }
        if (method_exists($user, 'can')) {
            return $user->can('administrate') || $user->can('admin');
        }
        // If no method of authorizing return false;
        return false;
    }
}
