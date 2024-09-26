<?php

namespace strtob\yii2WidgetToolkit\FontIconPicker;

use yii\web\AssetBundle;

class FontIconPickerAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'path/to/fonticonpicker.css', 
    ];
    public $js = [
        'path/to/jquery.fonticonpicker.js', 
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
