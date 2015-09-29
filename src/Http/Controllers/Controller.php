<?php namespace Taskforcedev\LaravelSupport\Http\Controllers

use Illuminate\Routing\Controller as IlluminateController;
use Illuminate\Console\AppNamespaceDetectorTrait;

class Controller extends IlluminateController
{
    use AppNamespaceDetectorTrait;

    protected function buildData()
    {
        return [
            'layout' => $this->getLayout(),
            'isAdmin' => $this->canAdministrate(),
            'sitename' => $this->getSitename(),
        ];
    }

    public function getUser()
    {
        return (Auth::check() ? \Auth::user() : $this->guest());
    }

    public function getSitename()
    {
        return config('taskforce-support.sitename');
    }

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
            return $user->can('administrate');
        }
        // If no method of authorizing return false;
        return false;
    }
}
