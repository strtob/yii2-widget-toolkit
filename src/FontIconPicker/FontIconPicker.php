<?php

namespace strtob\yii2WidgetToolkit\FontIconPicker;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class FontIconPicker extends Widget
{
    public $model; 
    public $attribute; 
    public $iconList = []; 
    public $options = []; 

    public function init()
    {
        parent::init();
        
        if (empty($this->iconList)) {
            $this->iconList = ['fa fa-user', 'fa fa-home', 'fa fa-cog']; 
        }
    }

    public function run()
    {
        $icon = Html::activeTextInput($this->model, $this->attribute, $this->options);
        return $icon . $this->registerScripts();
    }

    protected function registerScripts()
    {
        $view = $this->getView();
        FontIconPickerAsset::register($view);

        $js = <<<JS
        $(document).ready(function() {
            $('#{$this->options['id']}').fontIconPicker({
                icons: {$this->generateIconList()}
            });
        });
        JS;

        $view->registerJs($js);
    }

    protected function generateIconList()
    {
        return json_encode($this->iconList);
    }
}
