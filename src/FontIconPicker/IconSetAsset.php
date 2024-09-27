<?php
namespace strtob\yii2WidgetToolkit\FontIconPicker;

use yii\web\AssetBundle;

class IconSetAsset extends AssetBundle
{
    public $sourcePath = '@vendor/strtob/yii2-widget-toolkit/src/FontIconPicker';
    
    public $js = [
        'js/IconSet.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];

    public $publishOptions = [
        'forceCopy' => YII_DEBUG, // Enable force copy in debug mode
    ];

}
