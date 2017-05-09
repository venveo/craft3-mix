# Use Laravel Elixir (or any rev-manifest) with Craft CMS

You can already use Laravel Mix (Formerly Elixir) with Craft. It's rather straight forward. In fact, Matt Stauffer has an [excellent write up on using Elixir on his company blog](http://blog.tighten.co/setting-up-your-first-vuejs-site-using-laravel-elixir-and-vueify?utm_source=github.com/venveo/craft-elixir).

However, when using a CDN such as [CloudFlare](https://www.cloudflare.com/) or [Fastly](https://www.fastly.com/). You might want to take advantage of file versioning to bust the cache. This plugin lets you use Elixir's built in versioning in your Craft templates!

### Don't use Mix?
That's okay! The rev-manifest format is standard and this plugin is build-process agnostic. Just make sure your paths are configured properly.
## Requirements
- Craft 3 (Tested on Beta 10)
- Composer
## Installation and Setup
Please follow the installation guide for Craft 3 plugins [here](https://github.com/craftcms/docs/blob/master/en/plugin-intro.md#loading-your-plugin-into-craft)
## Usage
Twig Function

```
{{ mix('css/all.css') }}
```

> *Note:* you can optionally output the entire HTML tag by passing a second argument `true` to the function (e.g `{{ elixir('css/all.css', true) }}`. 

Twig Filter

```
{{ 'css/all.css' | mix }}
```

`<link rel="stylesheet" href="{{ craft.mix.version('css/all.css') }}">`

and

`<script src="{{ craft.mix.version('js/app.js') }}"></script>`

If you are especially lazy, you can have the plugin automatically create the entire tag, based on the file extension.

`{{ craft.mix.withTag('js/app.js') | raw }}`

This will output the `<script>` or `<link>` tags appropriately.

## Credits

* [Jason McCallister](https://github.com/themccallister)
* [Carlo Latiano](https://github.com/carlolaitano)
* [Ransom Roberson](https://github.com/mosnar)

## About Venveo

Venveo is a Digital Marketing Agency for Building Materials Companies in Blacksburg, VA. Learn more about us on [our website](https://www.venveo.com).

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
