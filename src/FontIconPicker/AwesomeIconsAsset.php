<?php

namespace strtob\yii2WidgetToolkit\FontIconPicker;

use yii\web\AssetBundle;

class AwesomeIconsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/fortawesome/font-awesome';
    public $css = [
        'css/all.min.css',
    ];
    

    public $publishOptions = [
        'forceCopy' => YII_DEBUG,
    ];

    public $depends = [
        \strtob\yii2WidgetToolkit\FontIconPicker\FontIconPickerAsset::class,
    ];
}
