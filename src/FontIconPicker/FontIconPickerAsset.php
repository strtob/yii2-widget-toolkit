<?php
namespace strtob\yii2WidgetToolkit\FontIconPicker;

use yii\web\AssetBundle;

class FontIconPickerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/strtob/yii2-widget-toolkit/src/FontIconPicker/node_modules/@fonticonpicker/fonticonpicker/dist';
    
    public $css = [      
        'css/base/jquery.fonticonpicker.min.css',
        'css/themes/grey-theme/jquery.fonticonpicker.grey.min.css',
        'css/themes/bootstrap-theme/jquery.fonticonpicker.bootstrap.min.css',
    ];
    
    public $js = [
        'js/jquery.fonticonpicker.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];

    public $publishOptions = [
        'forceCopy' => YII_DEBUG, // Enable force copy in debug mode
    ];

      

}
