<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use strtob\yii2Helpers\IconHelper;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\sys\SysLogAccess */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="d-flex align-items-center mb-3">
    <h5 class="flex-grow-1 fs-16 mb-0 text-primary">
        <i class="<?= IconHelper::get('meta') ?> me-1"></i>
        <span class="form-title"><?= yii::t('app', 'Meta') ?></span>          
    </h5>        
</div>


<div class="row">
    <div class="col-xl-12">
        <div class="card crm-widget">
            <div class="card-body p-0">
                <div class="row row-cols-md-3 row-cols-1">

                    <div class="col col-lg border-end">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-14">
                                <?= Yii::t('app', 'Created at') ?>                                    
                            </h5>
                            <div class="d-flex align-items-top">
                                <div class="flex-shrink-0">
                                    <i class="ri-time-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">                                       
                                    <?php
                                    if (isset($model->created_at))
                                    {
                                        echo '<span class="lead">' . \Yii::$app->formatter->asDatetime($model->created_at) . '</span>';
                                        echo '<p>' . \Yii::$app->formatter->asRelativeTime($model->created_at) . '</p>';
                                    }
                                    ?>                                                                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col col-lg border-end">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-14">
                                <?=
                                Yii::t('app',
                                       'Created by')
                                ?>                                           
                            </h5>
                            <?php if (isset($model->updated_by)): ?>

                                <div class="d-flex align-items-top">
                                    <div class="flex-shrink-0">
                                        <?php
                                        $usr       = User::findOne($model->created_by);
                                        if (!is_null($usr))
                                            echo '<img class="avatar-sm rounded mt-2 rounded" src="' . $usr->getUserImageUrl() . '">';
                                        ?>
                                    </div>
                                    <div class="flex-grow-1 ms-3"> 
                                        <?php
                                        $modelUser = User::findOne($model->created_by);
                                        if (!is_null($modelUser))
                                            echo '<span class="lead">' . (isset($modelUser) ? $modelUser->getFullName() : 'n/a') . '</span>';
                                        ?>                                    
                                    </div>
                                </div>

                            <?php endif ?>     
                        </div>
                    </div>

                    <div class="col col-lg border-end">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-14">
                                <?= Yii::t('app', 'Updated latest at') ?>                                          
                            </h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-time-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">                                       
                                    <?php
                                    if (isset($model->updated_at))
                                    {
                                        echo '<span class="lead">' . \Yii::$app->formatter->asDatetime($model->updated_at) . '</span>';
                                        echo '<p>' . \Yii::$app->formatter->asRelativeTime($model->updated_at) . '</p>';
                                    }
                                    ?>                                                                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col col-lg border-end">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-14">
                                <?= Yii::t('app', 'Updated latest by') ?>                                          
                            </h5>

                            <?php if (isset($model->updated_by)): ?>

                                <div class="d-flex align-items-top">
                                    <div class="flex-shrink-0">
                                        <?php
                                        if (!is_null($usr))
                                        {
                                            $usr = User::findOne($model->updated_by);
                                            echo '<img class="avatar-sm rounded mt-2 rounded" src="' . $usr->getUserImageUrl() . '">';
                                        }
                                        ?>
                                    </div>
                                    <div class="flex-grow-1 ms-3"> 
                                        <?php
                                        $modelUser = User::findOne($model->updated_by);
                                        if (!is_null($modelUser))
                                            echo '<span class="lead">' . (isset($modelUser) ? $modelUser->getFullName() : 'n/a') . '</span>';
                                        ?>                                    
                                    </div>
                                </div>

                            <?php endif ?>

                        </div>
                    </div>  

                    <div class="col col-lg border-end">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-14">
                                <?= Yii::t('app', 'Version') ?>                                         
                            </h5>
                            <div class="d-flex align-items-top">
                                <div class="flex-shrink-0">
                                    <i class="ri-history-line display-6 text-muted"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">
                                        <?php echo '<p>' . (isset($model->db_lock) ? $model->db_lock : 'n/a') . '</p>';
                                        ?>                                        </h5>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <!-- end col -->
                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div>
</div>