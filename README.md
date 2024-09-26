# Yii2 Widget Toolkit

A toolkit of Yii2 widgets.

## FontIconPicker Widget

### Installation

```bash
composer require strtob/yii2-widget-toolkit


<?= $form->field($model, 'icon')->widget(\strtob\yii2WidgetToolkit\FontIconPicker\FontIconPicker::class, [
    'iconList' => ['fa fa-user', 'fa fa-home', 'fa fa-cog'], 
]) ?>
