<?php
/**
 * Elixir plugin for Craft CMS 3.x
 *
 * Helper plugin for Laravel Elixir in Craft templates
 *
 * @link      https://venveo.com
 * @copyright Copyright (c) 2017 Venveo
 */

namespace venveo\elixir\twigextensions;

use venveo\elixir\Elixir;

use Craft;

/**
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators,
 * global variables, and functions. You can even extend the parser itself with
 * node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 *
 * @author    Venveo
 * @package   Elixir
 * @since     2.0.0
 */
class ElixirTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'Elixir';
    }

    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'file' | elixir }}
     *
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('elixir', [$this, 'elixir']),
        ];
    }

    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = elixir(file, tag) %}
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('elixir', [$this, 'elixir']),
        ];
    }

    /**
    * Returns versioned asset or the asset with tag.
    *
    * @param $file
    * @param bool $tag
    * @return mixed
    */
    public function elixir($file, $tag = false)
    {
        if ($tag) {
            Elixir::$plugin->elixirService->withTag($file);
        }
        Elixir::$plugin->elixirService->version($file);
    }
}