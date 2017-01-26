# Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## [1.1.0] - 2017-01-26
### Changed
 - Requires Laravel 5.4+
 - Reference of AppNamespaceDetectorTrait updated to DetectsApplicationNamespace (Laravel 5.4 change)

## [1.0.17] - 2017-01-20
### Fixed
 - Fix issue with layouts namespace.

## [1.0.16] - 2017-01-20
### Added
 - Add bootstrap 3 view partials.

### Changed
 - Test new bootstrap 4 navbar structure.

## [1.0.15] - 2017-01-20
### Added
 - Add views partials for BS4 and F6.
 - Use CDN for foundation 6.
 - Pass UI helper through to views for css class helping.

## [1.0.14] - 2017-01-20
### Fixed
 - Use correct view namespace.

## [1.0.13] - 2017-01-19
### Added
- Master Layout: Add additional yield's for the following:
  * head
  * styles
  * breadcrumbs
  * navigation
  * scripts
- Pass (css) framework variable through to controller buildData method for use in views.

## [1.0.12] - 2016-12-23
### Added
- Add a composer helper class to aid in determining if a composer package exists.
- Add a UI helper class to assist in providing framework specific classes.
- Create a facade for accessing Composer and UI helper classes.
- Composer: Add ability to check if a package exists.

## [1.0.11] - 2016-12-16
### Added
- Add list of frameworks into the taskforce-support config, this will allow packages to use the correct classes in views etc.

### Changed
- Use built-in app.name instead of taskforce-support.sitename - (no need to duplicate config).
- Update requirements to Laravel 5.3 as app.name is new to that version.

### Removed
- Remove config field for sitename.

## [1.0.10] - 2016-11-16
### Changed
- buildData() now also passes user variable if user is logged in.
- Update php version requirements to 5.6.4 to match Laravel 5.3

## [1.0.9] - 2016-11-14
### Changed
- Add validation, job dispatch and auth into base controller.
- Changed documentation to reflect support only for Laravel 5.3 or above.

## [1.0.8] - 2016-05-12
### Added
- Merge code from danhunsaker to use laravel config to return user model.

## [1.0.7] - 2015-12-07
### Fixed
- Fix method calling from $this->guest() to $this->createGuest()

## [1.0.6] - 2015-12-06
### Fixed
- Add missing use statement.

## [1.0.5] - 2015-12-06
### Changed
- Extracted user model detection code into seperate re-usable helper
- Updated README
### Added
- Create .gitignore and .gitattributes files.

## [1.0.4] - 2015-10-22
### Fixed
- Fix config value retrieval for layout.

## [1.0.3] - 2015-09-30
### Fixed
- Fix Controller.php

## [1.0.2] - 2015-09-30
### Fixed
- Fixed missing ; after controller namespace.

## [1.0.1] - 2015-09-30
### Fixed
- Fixed ServiceProvider including non-existant routes file.

## [1.0.0] - 2015-09-30
### Added
- Added master layout which packages can extend (Includes jQuery/Bootstrap).
- Ability to configure sitename which can be used in depending packages.
- Ability to configure layout choice in one central package (makes site using multiple packages consistent).


[Unreleased]: https://github.com/taskforcedev/laravel-support/compare/v1.0.7...HEAD
[1.0.7]: https://github.com/taskforcedev/laravel-support/compare/v1.0.6...v1.0.7
[1.0.6]: https://github.com/taskforcedev/laravel-support/compare/v1.0.5...v1.0.6
[1.0.5]: https://github.com/taskforcedev/laravel-support/compare/v1.0.4...v1.0.5
[1.0.4]: https://github.com/taskforcedev/laravel-support/compare/v1.0.3...v1.0.4
[1.0.3]: https://github.com/taskforcedev/laravel-support/compare/v1.0.2...v1.0.3
[1.0.2]: https://github.com/taskforcedev/laravel-support/compare/v1.0.1...v1.0.2
[1.0.1]: https://github.com/taskforcedev/laravel-support/compare/v1.0.0...v1.0.1
