<?php
/**
 * Mix plugin for Craft CMS 3.x
 *
 * Helper plugin for Laravel Mix in Craft templates
 *
 * @link      https://venveo.com
 * @copyright Copyright (c) 2017 Venveo
 */

namespace venveo\mix\models;

use venveo\mix\Mix;

use Craft;
use craft\base\Model;

/**
 * Mix Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Venveo
 * @package   Mix
 * @since     2.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Build path
     *
     * @var string
     */
    public $buildPath = 'build';

    /**
     * Public path
     *
     * @var string
     */
    public $publicPath = 'public';


    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['buildPath', 'string'],
            ['buildPath', 'default', 'value' => 'build'],
            ['publicPath', 'string'],
            ['publicPath', 'default', 'value' => 'public'],
        ];
    }
}
