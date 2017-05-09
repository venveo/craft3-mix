<?php
/**
 * Mix plugin for Craft CMS 3.x
 *
 * Helper plugin for Laravel Mix in Craft templates
 *
 * @link      https://venveo.com
 * @copyright Copyright (c) 2017 Venveo
 */

namespace venveo\mix\variables;

use venveo\mix\Mix;

use Craft;

/**
 * Mix Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.mix }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Venveo
 * @package   Mix
 * @since     2.0.0
 */
class MixVariable
{
    // Public Methods
    // =========================================================================
    /**
     * Returns the assets version.
     */
    public function version(string $file)
    {
        return Mix::$plugin->mixService->version($file);
    }

    /**
     * Returns the assets version with the appropriate tag.
     */
    public function withTag(string $file)
    {
        return Mix::$plugin->mixService->withTag($file);
    }
}
