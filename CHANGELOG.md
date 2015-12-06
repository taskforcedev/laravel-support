# Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased]
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
