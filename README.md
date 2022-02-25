# Blade Shopify Icons

<a href="https://github.com/eduard9969/blade-shopify-icons/actions?query=workflow%3ATests">
    <img src="https://github.com/eduard9969/blade-shopify-icons/workflows/Tests/badge.svg" alt="Tests">
</a>
<a href="https://github.styleci.io/repos/462019071">
    <img src="https://github.styleci.io/repos/462019071/shield?style=flat" alt="Code Style">
</a>
<a href="https://packagist.org/packages/eduard9969/blade-shopify-icons">
    <img src="https://img.shields.io/packagist/v/eduard9969/blade-shopify-icons" alt="Latest Stable Version">
</a>
<a href="https://packagist.org/packages/eduard9969/blade-shopify-icons">
    <img src="https://img.shields.io/packagist/dt/eduard9969/blade-shopify-icons" alt="Total Downloads">
</a>

A package to easily make use of [Blade Shopify Icons](https://www.npmjs.com/package/@shopify/polaris-icons) in your Laravel Blade views.

For a full list of available icons see the [SVG directory](https://github.com/Eduard9969/blade-shopify-icons/blob/main/resources/svg) or preview them at [shopify.com](https://polaris-icons.shopify.com/). Shopify Icons are originally developed by [Shopify Team](https://shopify.dev/).

## Requirements

- PHP 7.4 or higher
- Laravel 8.0 or higher

## Installation

```bash
composer require eduard9969/blade-shopify-icons
```

## Updating

Please refer to [`the upgrade guide`](UPGRADE.md) when updating the library.

## Blade Icons

Blade Shopify Icons uses Blade Icons under the hood. Please refer to [the Blade Icons readme](https://github.com/blade-ui-kit/blade-icons) for additional functionality. We also recommend to [enable icon caching](https://github.com/blade-ui-kit/blade-icons#caching) with this library.

## Configuration

Blade Shopify Icons also offers the ability to use features from Blade Icons like default classes, default attributes, etc. If you'd like to configure these, publish the `blade-shopify-icons.php` config file:

```bash
php artisan vendor:publish --tag=blade-shopify-icons-config
```

## Usage

Icon name skeleton:
```blade
{major|minor}-{icon-name}.svg
```

Icons can be used as self-closing Blade components which will be compiled to SVG icons:

```blade
<x-shi-major-activities/>
```

You can also pass classes to your icon components:

```blade
<x-shi-major-activities class="w-6 h-6 text-gray-500"/>
```

And even use inline styles:

```blade
<x-shi-major-activities style="color: #555"/>
```

### Raw SVG Icons

If you want to use the raw SVG icons as assets, you can publish them using:

```bash
php artisan vendor:publish --tag=blade-shopify-icons --force
```

Then use them in your views like:

```blade
<img src="{{ asset('vendor/blade-shopify-icons/major-activities.svg') }}" width="10" height="10"/>
```

## Changelog

Check out the [CHANGELOG](CHANGELOG.md) in this repository for all the recent changes.

## Maintainers

Blade Shopify Icons is developed and maintained by [Eduard Samoilenko](https://readytest.tk).

## License

Blade Shopify Icons is open-sourced software licensed under [the MIT license](LICENSE.md).
