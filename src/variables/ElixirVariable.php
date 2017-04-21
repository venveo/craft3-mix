<?php
/**
 * Elixir plugin for Craft CMS 3.x
 *
 * Helper plugin for Laravel Elixir in Craft templates
 *
 * @link      https://venveo.com
 * @copyright Copyright (c) 2017 Venveo
 */

namespace venveo\elixir\variables;

use venveo\elixir\Elixir;

use Craft;

/**
 * Elixir Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.elixir }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Venveo
 * @package   Elixir
 * @since     2.0.0
 */
class ElixirVariable
{
    // Public Methods
    // =========================================================================
    /**
     * Returns the assets version.
     */
    public function version(string $file)
    {
        return Elixir::$plugin->elixirService->version($file);
    }

    /**
     * Returns the assets version with the appropriate tag.
     */
    public function withTag(string $file)
    {
        return Elixir::$plugin->elixirService->withTag($file);
    }
}
