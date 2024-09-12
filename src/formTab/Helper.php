<?php

namespace strtob\yii2widgetkit;

/**
 * Description of Helper
 *
 * @author Tobias Streckel <ts@re-soft.de>
 */
class Helper
{

    public static function tabCounterMarker($pjaxContainerId, $dataProvider)
    {
        \yii\widgets\Pjax::begin(['id' => $pjaxContainerId. '-counter', 'enablePushState' => false]);
        $count = $dataProvider->getTotalCount();
        if($count > 0)
            echo '<div class="tabCounterValue" value="'.$count.'" style="display: none"></div>';
        \yii\widgets\Pjax::end();
    }
}
