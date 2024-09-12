<?php

namespace strtob\yii2widgetkit;

use yii\web\AssetBundle;

/**
 * Theme main asset bundle.
 */
class FormTabCounterAsset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/strtob/yii2-widget-kit/src/formTab/assets';

    /**
     * @inheritdoc
     */
    public $css = [
    ];
    public $js = [
        'formTabCounter.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [        
        'yii\web\JqueryAsset',
        'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
    ];
}
