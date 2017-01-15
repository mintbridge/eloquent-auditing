# Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased]

## 0.0.5 - 2017-01-15
### Changed
- Allow ip address to be null in database
- Auto populate ip address from Request

## 0.0.4 - 2015-01-08
### Added
- Allow the user_id column to be null, so that artisan commands that use
models don't throw exceptions

### Fixed
- Rename the migration files to be .stub so that artisan does not throw
duplicate migration warnings

## 0.0.1 - 2015-12-06
### Added
- Initial implementation allows model events to be logged to a database
