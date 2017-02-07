# laravel-support
Support package for Taskforcedev Laravel packages.

Provides a consistant way to get user specified layouts, sitename, and user administration rights (using conventions on the user model - if applicable).

## Requirements

- Laravel 5.3+

## Features
- Provides a 'base' controller which can be extended to ensure all views have access to the buildData method.
- Provides a single place to edit config for all Taskforcedev packages (other packages are free to require this also).
- Provides authorization helper support if your user model follows some of our known conventions.
- Provides user model namespace detection, allows packages to interact with the user model easily.

## Installation

Add the following line to your composer require: (not necessary if you already have a package which depends on laravel-support)

Laravel 5.3

    "require": {
        "taskforcedev/laravel-support": "1.0.*"
    },

Laravel 5.4

    "require": {
        "taskforcedev/laravel-support": "1.1.*"
    },

Then if you don't already have the following entry in your config/app.php add it also:

    Taskforcedev\LaravelSupport\ServiceProvider::class,


### Configuration
This package provides a single place where the following can be configured and used by packages which use this.

- Layout (which layout to use, provides all packages the same visual theme if set to your own custom layout.).

- Frameworks, allows you to specify which frameworks are enabled in your layouts - Other packages can then use this information to load appropriate displays.

### Publish Config
In order to edit the configuration please run the following command to publish the taskforce-support.php file into your apps config directory

<code>php artisan vendor:publish --tag="taskforce-support"</code>

## Controller

The package provides a controller which if extended by your own controllers will provide the method buildData($data = []) which allows all controllers to access the same set of shared data.

As well as the shared data the method also accepts an array for which these extra values will be added to the data object.

Example:

    use Taskforcedev\LaravelSupport\Http\Controllers\Controller
    
    class MyController extends Controller
    {
        public function index()
        {
            $data = [
                'title' => 'My Page',
                'description' => 'This is my page',
            ];
            $data = $this->buildData();
            return view('myview', $data);
        }
    }

## Helpers
### User
#### Get the user model
This can then be used in eloquent relations within packages to prevent hardcoding or configuring user model in external config.  Or anywhere else where you need the model name of user model.

##### Example
    use Taskforcedev\LaravelSupport\Helpers\User as UserHelper;

    Class whatever
    {
        public function author() {
            $userHelper = new UserHelper();</code>
            $model = $userHelper->getUserModel();
            return $this->belongsTo($model);
        }
    }

## Contributing

Issues and pull requests are always appreciated, particularly anything relating to the new UI facade.

Please ensure any PHP is PSR-2 standard.

For anything else please raise a gihub issue.
