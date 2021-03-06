<?php
/**
 * Mix plugin for Craft CMS 3.x
 *
 * Helper plugin for Laravel Mix in Craft templates
 *
 * @link      https://venveo.com
 * @copyright Copyright (c) 2017 Venveo
 */

namespace venveo\mix\services;

use venveo\mix\Mix;

use Craft;
use craft\base\Component;

/**
 * MixService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Venveo
 * @package   Mix
 * @since     2.0.0
 */
class MixService extends Component
{
    /**
     * @var string
     */
    protected $buildPath;

    /**
     * @var string
     */
    protected $publicPath;

    /**
     * @var string
     */
    protected $manifest;

    // Public Methods
    // =========================================================================

    public function __construct()
    {
        $settings = Mix::$plugin->getSettings();
        $this->buildPath = $settings->buildPath;
        $this->publicPath = $settings->publicPath;
        $basePath = \Yii::getAlias('@webroot');
        $this->manifest = $basePath . '/' . $this->buildPath . '/rev-manifest.json';
    }


    /**
     * Find the files version.
     *
     * @param $file
     *
     * @return mixed
     */
    public function version($file)
    {
        try {
            $manifest = $this->readManifestFile();
        } catch (\Exception $e) {
            return $this->buildPath . '/' . $file;
        }

        // if no manifest, return the regular asset
        if (!$manifest) {
            return $this->buildPath . '/' . $file;
        }

        // If asset isn't in the manifest, return file name
        if (array_key_exists($file, $manifest)) {
            return '/' . $this->buildPath . '/' . $manifest[$file];
        }

        return '/' . $this->buildPath . '/' . $file;
    }

    /**
     * Returns the assets version with the appropriate tag.
     *
     * @param $file
     *
     * @return string
     */
    public function withTag($file)
    {
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        try {
            $manifest = $this->readManifestFile();
        } catch (\Exception $e) {
            return $file;
        }

        // if no manifest, return the regular asset
        if (!$manifest) {
            if ($extension == 'js') {
                return '<script src="' . $this->buildPath . '/' . $file . '"></script>';
            }

            return '<link rel="stylesheet" href="' . $file . '">';
        }

        if ($extension == 'js') {
            return '<script src="' . $this->buildPath . '/' . $manifest[$file] . '"></script>';
        }

        return '<link rel="stylesheet" href="' . $this->buildPath . '/' . $manifest[$file] . '">';
    }

    /**
     * Locate manifest and convert to an array.
     *
     * @return mixed
     */
    protected function readManifestFile()
    {
        if (file_exists($this->manifest)) {
            return json_decode(
                file_get_contents($this->manifest),
                true
            );
        }

        return false;
    }
}

