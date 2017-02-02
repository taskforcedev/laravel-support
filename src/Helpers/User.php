<?php namespace Taskforcedev\LaravelSupport\Helpers;

use Auth;
use Config;
use Illuminate\Console\DetectsApplicationNamespace;

class User
{
    use DetectsApplicationNamespace;

    /**
     * Gets the user model if found.
     * @return bool|string
     */
    public function getUserModel()
    {
        /* Check the app's auth config, first */
        $model = Config::get('auth.model');
        if (class_exists($model)) {
            return $model;
        }
        /* That didn't work, so let's try our fallback.  First get the namespace */
        $ns = $this->getAppNamespace();
        if ($ns) {
            /* Try laravel default convention (models in the app folder). */
            $model = $ns . 'User';
            if (class_exists($model)) {
                return $model;
            }
            /* Try secondary convention of having a models directory. */
            $model = $ns . 'Models\User';
            if (class_exists($model)) {
                return $model;
            }
        }
        return false;
    }

    /**
     * If user is authenticated retrieve user, otherwise create a guest user.
     * @return mixed
     */
    public function getUser()
    {
        return (Auth::check() ? Auth::user() : $this->createGuest());
    }

    /**
     * Return an instance of a guest user, uses user model if exists.
     * @return object
     */
    public function createGuest()
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
     * Determine if the user is an administrator using methods on the user model (if found).
     * @return bool
     */
    public function canAdministrate()
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
