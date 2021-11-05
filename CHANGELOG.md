# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]
## [1.0.0] - 2019-11-05
### Added
- [GH#11](https://github.com/Korbeil/phpstan-generic-rules/pull/11) Add compatibility with PHPStan 1.0

### Fixed
- [GH#12](https://github.com/Korbeil/phpstan-generic-rules/pull/12) Fix compatibility with PHPStan 1.0

## [0.2.1] - 2019-09-24
### Fixed
- [GH#6](https://github.com/Korbeil/phpstan-generic-rules/pull/6) Loosening the phpstan requirement

## [0.2.0] - 2019-09-12
### Added
- [GH#3](https://github.com/Korbeil/phpstan-generic-rules/pull/3) MbStringRule for string function that have a `mb_*` equivalent

### Changed
- [GH#4](https://github.com/Korbeil/phpstan-generic-rules/pull/4) DebugRule is faster

## [0.1.0] - 2019-09-12
### Added
- DebugRule for `var_dump`, `exit` and `die` function calls
- DebugRule (in Symfony context) for `dump` and `dd` function calls

[Unreleased]: https://github.com/Korbeil/phpstan-generic-rules/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/olivierlacan/keep-a-changelog/compare/v0.2.1...v1.0.0
[0.2.1]: https://github.com/olivierlacan/keep-a-changelog/compare/v0.2.0...v0.2.1
[0.2.0]: https://github.com/olivierlacan/keep-a-changelog/compare/v0.1.0...v0.2.0
[0.1.0]: https://github.com/Korbeil/phpstan-generic-rules/releases/tag/v0.1.0
