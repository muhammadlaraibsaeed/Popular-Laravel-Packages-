# Composer Require Command

## Overview

The `composer require` command is used in PHP's Composer dependency manager to add a package to your project.

## Components

- **composer**: The command-line tool for managing PHP dependencies.
- **require**: Indicates that you want to add a package as a dependency for your project.

## Usage

When you run `composer require <package-name>`, Composer performs the following actions:

1. **Adds the package**: Downloads the specified package from Packagist (or another repository) and installs it into the `vendor` directory.
2. **Updates `composer.json`**: Adds the package to the `require` section of your `composer.json` file.
3. **Updates `composer.lock`**: Updates the `composer.lock` file to reflect the new dependencies, locking the specific versions used.

## Example
```
    composer require guzzlehttp/guzzle
```

```

# Basic Structure Composer.json

```
{
    "name": "vendor/package",
    "description": "A brief description of the package",
    "type": "library", // or "project", "metapackage", etc.
    "require": {
        "php": "^7.3|^8.0", // specify PHP version
        "vendor/package-name": "^1.0" // other package dependencies
    },
    "require-dev": {
        "vendor/package-name": "^1.0" // development dependencies
    },
    "autoload": {
        "psr-4": {
            "Namespace\\": "src/" // autoloading configuration
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/" // autoloading for dev
        }
    },
    "scripts": {
        "post-install-cmd": [
            "SomeCommand::run()" // scripts to run after install
        ],
        "post-update-cmd": [
            "SomeCommand::run()" // scripts to run after update
        ]
    },
    "minimum-stability": "stable", // minimum stability for dependencies
    "prefer-stable": true // prefer stable versions of dependencies
}
```

- **Description:** A short description of the package.
- **Type:** The type of package (e.g., library, project).
- **Require:** Lists the dependencies required for your project.
- **Require-dev:** Lists the dependencies needed for development purposes.
- **Autoload:** Defines how your classes will be autoloaded.
- **Scripts:** Scripts that can be executed during various Composer events.
- **Minimum Stability:** Specifies the minimum stability of packages.
- **Prefer Stable:** Indicates a preference for stable versions of packages.

```

# Vendor Publish Command & Vendor Publish Command Flags

```
    php artisan vendor:publish
```

## Purpose
Publishes assets, configuration files, views, or resources from third-party packages.

## Customization
Allows you to modify published resources as needed for your application.

## Common Use Cases
- **Configuration Files**: Make changes to package settings.
- **Assets**: Publish JavaScript, CSS, or images.
- **Views**: Customize views from packages in `resources/views`.
- **Translations**: Modify translation files for text displayed in the app.

## Usage
Can specify a vendor to publish resources only from that package



## Commonly Used Flags

- `--provider`: Specify the service provider from which to publish resources.
  - Example: `php artisan vendor:publish --provider="Vendor\Package\ServiceProvider"`

- `--tag`: Publish resources associated with a specific tag defined by the package.
  - Example: `php artisan vendor:publish --tag=config`

- `--force`: Overwrite any existing files when publishing resources.
  - Example: `php artisan vendor:publish --force`

- `--all`: Publish all vendor resources for all providers.
  - Example: `php artisan vendor:publish --all`
