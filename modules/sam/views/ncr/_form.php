<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\date\DatePicker;

use yii\helpers\ArrayHelper;
use app\modules\sam\models\Department;
use app\modules\sam\models\Problem;
//
use kartik\widgets\Select2;
?>

<div class="ncr-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->errorSummary($model) ?>

    <div class="card">
        <div class="card-header bg-secondary">
            <b style="color:white">รายงานผลิตภัณฑ์ที่ไม่เป็นไปตามข้อกำหนด (NON-CONFORMANCE REPORT : NCR)</b>
        </div>
        <div class="card-body">

            <!-- hiddenInput -->
            <?= $form->field($model, 'ref')->hiddenInput(['maxlength' => 50])->label(false); ?>
            <?= $form->field($model, 'event_name')->hiddenInput(['disabled' => true])->label(false) ?>
            <?= $form->field($model, 'status')->hiddenInput(['disabled' => true])->label(false) ?>


            <!-- Show Input -->
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'to_department')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Department::find()->all(), 'department_id', 'details'),
                        'options' => [
                            'multiple' => true,
                            'placeholder' => Yii::t('app', 'Please Select...')
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>

                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'problem')->widget(Select2::class, [
                        'language' => 'th',
                        'data' => ArrayHelper::map(Problem::find()->all(), 'problem_id', 'name'),
                        'options' => ['multiple' => true, 'placeholder' => Yii::t('app', 'Please Select...')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>

        <div class="card-header bg-secondary">
            <b style="color:white"><u>ส่วนที่ 1</u> รายละเอียดของปัญหาที่เกิด</b>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <?= $form->field($model, 'lot')->textInput(['maxlength' => 100]) ?>
                </div>
                <div class="col-sm-6 col-md-6">
                    <?= $form->field($model, 'production_date')->widget(
                        DatePicker::class,
                        [
                            'language' => 'th',
                            'options' => ['placeholder' => Yii::t('app', 'Please Select...')],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true
                            ]
                        ]
                    ); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <?= $form->field($model, 'product_name')->textInput(['maxlength' => 200]) ?>
                </div>
                <div class="col-sm-6 col-md-6">
                    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => 150]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <?= $form->field($model, 'detail')->textarea(['rows' => 3]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <?= $form->field($model, 'from_department')->dropDownList(ArrayHelper::map(Department::find()->all(), 'department_id', 'details'), ['prompt' => Yii::t('app', 'Please Select...'),]) ?>
                </div>
                <div class="col-sm-4 col-md-4">
                    <?= $form->field($model, 'notify_by')->textInput(['maxlength' => 200]) ?>
                </div>
                <div class="col-sm-4 col-md-4">
                    <?= $form->field($model, 'proplem_date')->widget(
                        DatePicker::class,
                        [
                            'language' => 'th',
                            'options' => ['placeholder' => Yii::t('app', 'Please Select...')],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true
                            ]
                        ]
                    ); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <?= $form->field($model, 'recheck')->textarea(['rows' => 3]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group field-upload_files">
                        <label class="control-label" for="upload_files[]"> ภาพถ่าย </label>
                        <div>
                            <?= FileInput::widget([
                                'name' => 'upload_ajax[]',
                                'options' => ['multiple' => true, 'accept' => 'image/*'], //'accept' => 'image/*' หากต้องเฉพาะ image
                                'pluginOptions' => [
                                    'overwriteInitial' => false,
                                    'initialPreviewShowDelete' => true,
                                    'initialPreview' => $initialPreview,
                                    'initialPreviewConfig' => $initialPreviewConfig,
                                    'uploadUrl' => Url::to(['/sam/ncr/upload-ajax']),
                                    'uploadExtraData' => [
                                        'ref' => $model->ref,
                                    ],
                                    'maxFileCount' => 100
                                ]
                            ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-primary') . ' btn-lg btn-block']) ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>