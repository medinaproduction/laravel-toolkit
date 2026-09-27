# Laravel Toolkit Changelog

## 2.0.0
#### 2026-09-27

- Requires Laravel 13 and PHP 8.3 or later. Tested on PHP 8.3, 8.4 and 8.5
- Dropped support for Laravel 8 to 11 and PHP 8.1 and 8.2. Stay on 1.x for those
- Tests are no longer autoloaded in projects that install the package
- Added tests for VirtualModel, Timer, DividerHelper, TreeHelper and the service provider

## 1.0.6
#### 2022-12-07

- Updated the composer.json to accept installs on Laravel ^8.0 alongside ^9.0

## 1.0.5
#### 2022-12-07

- Added new Timer to the package Service folder

## 1.0.4
#### 2022-12-06

- Added Console/DividerHelper to make pretty dividers in the output

## 1.0.3
#### 2022-12-05

- Fixed issue with model output on Console/TreeHelper
- Changed colors for better visibility on Console/TreeHelper
- Changed handling of types on Console/TreeHelper

## 1.0.2
#### 2022-12-02

- Downgraded Laravel framework requirement to version 8.0 or higher

## 1.0.1
#### 2022-12-02

- Added DisplayTree trait that can be used in Commands

## 1.0.0
#### 2022-11-25

- Added VirtualModel as ModelType

## 0.0.1
#### 2022-11-25

- Initial commit, lets build something good!
