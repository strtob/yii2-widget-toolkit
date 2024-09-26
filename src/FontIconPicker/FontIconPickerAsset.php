<?php

namespace strtob\yii2WidgetToolkit\FontIconPicker;

use yii\web\AssetBundle;

class FontIconPickerAsset extends AssetBundle
{
    public $sourcePath = '@bower/fonticonpicker'; // Update if the path is different
    public $css = [
        'css/jquery.fonticonpicker.min.css', // Ensure this path is correct
    ];
    public $js = [
        'js/jquery.fonticonpicker.min.js', // Ensure this path is correct
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
