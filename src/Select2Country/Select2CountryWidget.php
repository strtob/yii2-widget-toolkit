<?php

namespace strtob\yii2WidgetToolkit\Select2Country;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use kartik\select2\Select2;
use yii\web\View;

/**
 * CountrySelect widget extends the [[Select2]] widget and uses countries list as data.
 *
 * Allows for features like displaying preferred countries, country flags, and 
 * placing the user's IP country at the top of the dropdown.
 */
class Select2CountryWidget extends Select2
{

    /**
     * Countries which should be at the top of the list.
     *
     * @var array
     */
    public $preferredCountries = ['DE', 'AT', 'FR', 'GB'];

    /**
     * If true, the widget will display the user's IP country at the top of the list.
     *
     * @var bool
     */
    public $enableIpCountryFirst = true;

    /**
     * If true, the widget will display country flag images.
     *
     * @var bool
     */
    public $displayFlags = true;

    /**
     * The model class representing the language table.
     *
     * @var string
     */
    public $modelClassLanguage = null;

    /**
     * The model class representing the country table.
     *
     * @var string
     */
    public $modelClassCountry = null;

    /**
     * User's IP country ISO code.
     *
     * @var string
     */
    protected $ipCountry;

    /**
     * Initializes the widget, sets up IP country and flags if required.
     *
     * @throws \ReflectionException
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        // Ensure the modelClassLanguage is provided
        if (is_null($this->modelClassLanguage)) {
            throw new \yii\base\InvalidConfigException('Parameter "modelClassLanguage" is required for Language Table');
        }

        // Set up IP country if enabled
        $this->setupIpCountry();

        // Set up flags rendering if enabled
        $this->setupFlagsRendering();

        // Set default placeholder if not set
        $this->options['placeholder'] = $this->options['placeholder'] ?? \Yii::t('user', 'Choose...');

        // Prepare dropdown data
        $this->data = $this->getDropdownData();

        // Call parent init method
        parent::init();
    }

    /**
     * Returns country name by its code.
     * 
     * @param string $code
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public static function getName($code)
    {
        // Ensure the modelClassCountry is defined
        if (is_null($this->modelClassCountry)) {
            throw new \yii\base\InvalidConfigException('modelClassCountry is required.');
        }

        // Fetch country name by code
        return $this->modelClassCountry::find()
            ->where(['code' => $code])
            ->one()
            ->name;
    }

    /**
     * Returns normalized array for dropdown mapped from country code to name.
     *
     * @return array
     */
    protected function getDropdownData()
    {
        // Fetch raw data and prepare preferred list
        $rawData = $this->getRawData();
        $priorityCountries = $this->getPreferredList();
        $finalList = [];

        // Add preferred countries at the top
        if ($priorityCountries) {
            foreach ($priorityCountries as $priorityCountry) {
                $finalList[$priorityCountry] = ArrayHelper::remove($rawData, $priorityCountry);
            }
        }

        // Add remaining countries
        foreach ($rawData as $data) {
            $finalList[$data['code']] = $data['name'];
        }

        return $finalList;
    }

    /**
     * Finds countries data by language from the model.
     *
     * Returns countries array mapped from code to name.
     *
     * @return array
     * @throws \yii\base\InvalidConfigException
     */
    protected function getRawData()
    {
        // Ensure modelClassCountry is provided
        if (is_null($this->modelClassCountry)) {
            throw new \yii\base\InvalidConfigException('modelClassCountry is required.');
        }

        // Fetch all country data from the country model
        $models = $this->modelClassCountry::find()->all();

        return ArrayHelper::toArray($models, [
            $this->modelClassCountry => [
                'code',
                'name',
            ],
        ]);
    }

    /**
     * Returns preferred countries list with IP country at the top if enabled.
     *
     * @return array
     */
    protected function getPreferredList()
    {
        // Insert the IP country at the top if enabled
        if ($this->ipCountry) {
            $needle = array_search($this->ipCountry, $this->preferredCountries);
            $arr[] = ArrayHelper::remove($this->preferredCountries, $needle);
            return array_merge($arr, $this->preferredCountries);
        }

        return $this->preferredCountries;
    }

    /**
     * Sets IP country code if enableIpCountryFirst is true.
     *
     * Uses GeoIP to determine the user's IP country.
     */
    protected function setupIpCountry()
    {
        if ($this->enableIpCountryFirst) {
            // Logic to set IP country using GeoIP or similar service (commented out)
            // This is pseudo-code to represent how it could be done
            /*
            $geoip = Yii::$app->geoip;
            $this->ipCountry = $geoip->ip()->isoCode;
            */
        }
    }

    /**
     * If displayFlags is true, formats the country list with flag images.
     */
    protected function setupFlagsRendering()
    {
        if ($this->displayFlags) {
            $this->registerFlagsDisplayJs();
            $this->pluginOptions['templateResult'] = new JsExpression('formatCountriesList');
            $this->pluginOptions['templateSelection'] = new JsExpression('formatCountriesList');
            $this->pluginOptions['escapeMarkup'] = new JsExpression('function(m) { return m; }');
        }
    }

    /**
     * Registers JavaScript function to add flag images to the country list.
     */
    protected function registerFlagsDisplayJs()
    {
        // Dynamically resolve the URL for the 'flags' subfolder
        $path = \Yii::getAlias('@web');  // Get the base URL of your web application
        $url = $path . '@vendor/strtob/yii2-widget-toolkit/src/Select2Country/flags/';  // Adjust this path to your actual location

        // Register JavaScript to format the dropdown with flag images
        $format = <<<SCRIPT
    var formatCountriesList = function (state, container) {
        if (!state.id) return state.text;  // If no id, just return the text

        var src = '$url' + state.id.toLowerCase() + '.png';  // Create the flag URL
        return '<img class="flag" src="' + src + '" style="height: 14px; margin-right: 5px;" /> ' + state.text;  // Add image and text
    };
    SCRIPT;

        $this->view->registerJs($format, View::POS_HEAD);
    }


    /**
     * Returns only the language part if the language consists of two parts (e.g., 'language-COUNTRY').
     *
     * @return string
     */
    protected function processLanguage()
    {
        $language = $this->language ?: Yii::$app->language;
        $parts = explode('-', $language);
        return $parts[0];
    }
}
