<?php
/**
 * Mix plugin for Craft CMS 3.x
 *
 * Helper plugin for Laravel Mix in Craft templates
 *
 * @link      https://venveo.com
 * @copyright Copyright (c) 2017 Venveo
 */

namespace venveo\mix\twigextensions;

use venveo\mix\Mix;

use Craft;

/**
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators,
 * global variables, and functions. You can even extend the parser itself with
 * node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 *
 * @author    Venveo
 * @package   Mix
 * @since     2.0.0
 */
class MixTwigExtension extends \Twig_Extension
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
        return 'Mix';
    }

    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'file' | mix }}
     *
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('mix', [$this, 'mix']),
        ];
    }

    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = mix(file, tag) %}
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('mix', [$this, 'mix']),
        ];
    }

    /**
    * Returns versioned asset or the asset with tag.
    *
    * @param $file
    * @param bool $tag
    * @return mixed
    */
    public function mix($file, $tag = false)
    {
        if ($tag) {
            Mix::$plugin->mixService->withTag($file);
        }
        Mix::$plugin->mixService->version($file);
    }
}