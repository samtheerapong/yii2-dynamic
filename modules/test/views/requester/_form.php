<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\modules\test\models\Requester $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="requester-form">

    <div class="card card-dark">
        <div class="card-header text-white bg-dark">
            <b>ฟอร์ม</b>
        </div>

        <div class="card-body">
            <?php $form = ActiveForm::begin([
                'id' => 'dynamic-form'
            ]); ?>
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-6 col-md-6">
                    <?= $form->field($model, 'created_at')->widget(
                        DatePicker::class,
                        [
                            'language' => 'th',
                            'options' => ['placeholder' => Yii::t('app', 'Please Select...')],
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true
                            ]
                        ]
                    ); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header text-white bg-secondary">
                            <b>Img</b>
                        </div>
                        <div class="card-body">
                            <?php DynamicFormWidget::begin([
                                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                                'widgetBody' => '.container-items', // required: css class selector
                                'widgetItem' => '.item', // required: css class
                                'limit' => 5, // the maximum times, an element can be cloned (default 999)
                                'min' => 1, // 0 or 1 (default 1)
                                'insertButton' => '.add-item', // css class
                                'deleteButton' => '.remove-item', // css class
                                'model' => $modelsRequestImg[0],
                                'formId' => 'dynamic-form',
                                'formFields' => [
                                    'po_item_no',
                                    'quantity',
                                ],
                            ]); ?>

                            <div class="container-items"><!-- widgetContainer -->
                                <?php foreach ($modelsRequestImg as $index => $modelRequestImg) : ?>
                                    <div class="item card"><!-- widgetBody -->
                                        <div class="card-body">
                                            <div class="float-right">
                                                <button type="button" class="add-item btn btn-success btn-xs"><i class="fa fa-plus"></i></button>
                                                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                                            </div>
                                            <p>
                                                <?php
                                                // necessary for update action.
                                                if (!$modelRequestImg->isNewRecord) {
                                                    echo Html::activeHiddenInput($modelRequestImg, "[{$index}]id");
                                                }
                                                ?>
                                                <?= $form->field($modelRequestImg, "[{$index}]name")->textInput(['maxlength' => true]) ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php DynamicFormWidget::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>