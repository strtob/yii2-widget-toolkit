<?php
namespace strtob\yii2WidgetToolkit\FontIconPicker;

use yii\web\AssetBundle;

class FontIconPickerAsset extends AssetBundle
{
    public $sourcePath = '@bower/fontawesome-iconpicker/dist'; 
    public $css = [
        'css/fontawesome-iconpicker.min.css',
    ];
    public $js = [
        'js/fontawesome-iconpicker.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap5\BootstrapAsset', 
    ];
}
