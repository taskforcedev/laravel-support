# laravel-support
Support package for Taskforcedev Laravel packages.

Provides a consistant way to get user specified layouts, sitename, and user administration rights (using conventions on the user model - if applicable).

# Features
- Provides a single place to edit config for all Taskforcedev packages (other packages are free to require this also).
- Provides authorization helper support if your user model follows some of our known conventions.

# Configuration
This package provides a single place where the following can be configured and used by packages which use this.

- Sitename (aka brand, used in bootstrap navbar on some templates.)

- Layout (which layout to use, provides all packages the same visual theme if set to your own custom layout.).
