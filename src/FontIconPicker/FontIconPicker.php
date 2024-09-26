<?php

namespace strtob\yii2WidgetToolkit\FontIconPicker;

use Yii;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\bootstrap5\InputWidget;

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
        FontIconPickerAsset::register($view);
        $id = $this->options['id'];
        $options = Json::encode($this->clientOptions);
 
        $js[] = "$(document).ready(function() {
            $('#{$id}').fontIconPicker({
               
                theme: 'fip-darkgrey'
            });
        });";

        $view->registerJs(implode("\n", $js));
    }
}
