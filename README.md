# laravel-support
Support package for Taskforcedev Laravel packages.

Provides a consistant way to get user specified layouts, sitename, and user administration rights (using conventions on the user model - if applicable).

## Requirements

- Laravel 5.2+

## Features
- Provides a single place to edit config for all Taskforcedev packages (other packages are free to require this also).
- Provides authorization helper support if your user model follows some of our known conventions.
- Provides user model namespace detection, allows packages to interact with the user model easily.

## Installation

Add the following line to your composer require: (not necessary if you already have a package which depends on laravel-support)

    "require": {
        "taskforcedev/laravel-support": "1.0.*"
    },

Then if you don't already have the following entry in your config/app.php add it also:

    Taskforcedev\LaravelSupport\ServiceProvider::class,


### Configuration
This package provides a single place where the following can be configured and used by packages which use this.

- Sitename (aka brand, used in bootstrap navbar on some templates.)

- Layout (which layout to use, provides all packages the same visual theme if set to your own custom layout.).

### Publish Config
In order to edit the configuration please run the following command to publish the taskforce-support.php file into your apps config directory

<code>php artisan vendor:publish --tag="taskforce-support"</code>

# Helpers
## User
### Get the user model
This can then be used in eloquent relations within packages to prevent hardcoding or configuring user model in external config.  Or anywhere else where you need the model name of user model.

#### Example
    use Taskforcedev\LaravelSupport\Helpers\User as UserHelper;

    Class whatever
    {
        public function author() {
            $userHelper = new UserHelper();</code>
            $model = $userHelper->getUserModel();
            return $this->belongsTo($model);
        }
    }
