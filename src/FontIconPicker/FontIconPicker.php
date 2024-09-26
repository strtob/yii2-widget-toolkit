<?php
namespace strtob\yii2WidgetToolkit\FontIconPicker;

use yii\web\AssetBundle;

class FontIconPickerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/strtob/yii2-widget-toolkit/src/FontIconPicker/node_modules/@fonticonpicker/fonticonpicker/dist';
    
    public $css = [      
        'css/base/jquery.fonticonpicker.min.css',
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

    // Add the fonts to the asset bundle
    public $fonts = [
        'fonts/iconpicker.eot',
        'fonts/iconpicker.woff',
        'fonts/iconpicker.ttf',
        'fonts/iconpicker.svg',
    ];
    
    public function init()
    {
        parent::init();
        $this->publishFonts();
    }

    protected function publishFonts()
    {
        // This method publishes the fonts
        foreach ($this->fonts as $font) {
            $this->css[] = $font; // You may use $this->css or $this->js depending on the structure.
        }
    }
}
