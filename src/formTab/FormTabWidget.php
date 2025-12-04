<?php

namespace strtob\yii2WidgetToolkit\formTab;

use Yii;

class FormTabWidget extends \yii\bootstrap5\Widget
{

    public $model;
    public $dataProviders = [];
    public $searchModels = [];
    public $tbl_sys_link_table_id;
    public $linked_table_id;
    public $showFilesRecursive = false;
    public $tabItems = [];
    public $uid = '';


    public function init()
    {

        // tbl_sys_link_table_id is optional
        // if (is_null($this->tbl_sys_link_table_id))
        //     throw new \Exception('tbl_sys_link_table_id parameter in widget not defined.');

        if (is_null($this->linked_table_id) && !$this->model->isNewRecord)
            throw new \Exception('linked_table_id parameter in widget not defined.');


        if ($this->uid === '')
            $this->uid = '_' . uniqid();

        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->renderWidget();
    }

    protected function renderWidget()
    {

        // renders a view named "view" and applies a layout to it
        return $this->render(
            'formTab',
            [
                'model' => $this->model,
                'dataProviders' => $this->dataProviders,
                'searchModels' => $this->searchModels,
                'tbl_sys_link_table_id' => $this->tbl_sys_link_table_id,
                'linked_table_id' => $this->linked_table_id,
                'showFilesRecursive' => $this->showFilesRecursive,
                'tabItems' => $this->tabItems,
                'uid' => $this->uid,
            ]
        );
    }

}
