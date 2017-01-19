<?php namespace Taskforcedev\LaravelSupport\Http\Controllers;

use \Auth;
use Illuminate\Routing\Controller as IlluminateController;
use Illuminate\Console\AppNamespaceDetectorTrait;
use Taskforcedev\LaravelSupport\Helpers\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Taskforcedev\LaravelSupport\Helpers\UI as UIHelper;

class Controller extends IlluminateController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, AppNamespaceDetectorTrait;

    /**
     * Populates $data object for use in controlers.
     */
    protected function buildData($data = [])
    {
        $uiHelper = new UIHelper();

        $data['layout'] = $this->getLayout();
        $data['isAdmin'] = $this->canAdministrate();
        $data['sitename'] = $this->getSitename();
        $data['framework'] = $uiHelper->getFramework();

        if (Auth::check()) {
            $data['user'] = Auth::user();
        }

        return $data;
    }

    /**
     * Get the view layout from config.
     */
    public function getLayout()
    {
        return config('taskforce-support.layout');
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
        return config('app.name', 'Laravel');
    }

    /**
     * Guest user object, uses main apps user model (if available)
     * in order to provide all required methods.
     */
    private function guest()
    {
        $user = new User();
        return $user->createGuest();
    }

    /**
     * Uses common conventions to attempt to authorize the user for admin actions.
     * @return bool
     */
    protected function canAdministrate()
    {
        $user = new User();
        return $user->canAdministrate();
    }

    /**
     * Get the user model.
     * @return bool|string
     */
    public function getUserModel()
    {
        $user = new User();
        return $user->getUserModel();
    }

    /**
     * Attempt to get an apps model from namespace.
     * @param $model
     * @return bool
     */
    public function getModel($model)
    {
        /* Get the namespace */
        $ns = $this->getAppNamespace();
        if ($ns) {
            /* Try laravel default convention (models in the app folder). */
            $qm = $ns . $model;
            if (class_exists($qm)) {
                return new $qm;
            }
            /* Try secondary convention of having a models directory. */
            $qm = $ns . 'Models' . '\\' . $model;
            if (class_exists($qm)) {
                return new $qm;
            }
        }
        return false;
    }
}
