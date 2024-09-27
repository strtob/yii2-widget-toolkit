# Yii2 Widget Toolkit

A toolkit set of Yii2 widgets.

## FontIconPicker Widget

The widget render FontIconPicker from https://fonticonpicker.github.io and works with bootstrap 5.

### Installation

```bash
composer require strtob/yii2-widget-toolkit
```

### Use

Just code the widget tag

```bash
 <?= $form->field($model, 'css_class')->widget(\strtob\yii2WidgetToolkit\FontIconPicker\FontIconPicker::class, []) ?>
```
