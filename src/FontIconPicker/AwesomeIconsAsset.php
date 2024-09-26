<?php
namespace app\assets;

use yii\web\AssetBundle;

class AwesomeIconAsset extends AssetBundle
{
    public $sourcePath = '@vendor/fontawesome/fontawesome-free';
    public $css = [
        'css/all.min.css',
    ];
    

    public $publishOptions = [
        'forceCopy' => YII_DEBUG,
    ];
}
