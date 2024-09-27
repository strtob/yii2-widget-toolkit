<?php

namespace strtob\yii2WidgetToolkit\FontIconPicker;

use Yii;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\bootstrap5\InputWidget;
use strtob\yii2WidgetToolkit\FontIconPicker\IconSetAsset;
use strtob\yii2WidgetToolkit\FontIconPicker\AwesomeIconsAsset;

class FontIconPicker extends InputWidget
{

    public $clientOptions = [];

    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textInput($this->name, $this->value, $this->options);
        }
        $this->registerClientScript();
    }

    /**
     * Publish resource
     */
    protected function registerClientScript()
    {
        $js = [];
        $view = $this->getView();        
        IconSetAsset::register($view);
        FontIconPickerAsset::register($view);
        AwesomeIconsAsset::register($view);      

        $id = $this->options['id'];
        $options = Json::encode($this->clientOptions);
 
        $js[] = "$(document).ready(function() {
            $('#{$id}').fontIconPicker({           
            theme: 'fip-bootstrap',
                source: iconscat
            });
        });";

        $view->registerJs(implode("\n", $js));
    }
}
