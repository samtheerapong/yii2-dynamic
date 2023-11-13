<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

use kartik\widgets\FileInput;

/** @var yii\web\View $this */
/** @var app\modules\sam\models\EasyUpload $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="easy-upload-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <div class="card">
        <div class="card-header bg-secondary">
            <b style="color:white"><?= Html::encode($this->title) ?></b>
        </div>
        <div class="card-body">
            <?= $form->field($model, 'ref')->hiddenInput(['maxlength' => 50])->label(false); ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'event_name')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'photo')->widget(FileInput::class, [
                // 'options' => ['multiple' => true],
                'pluginOptions' => [
                    // 'initialPreview' => $model->getPhotoViewer(),
                    'initialPreviewAsData' => true,
                    'showUpload' => true,
                    'allowedFileExtensions' => ['jpg', 'jpeg', 'png', 'gif'],
                    'maxFileSize' => 1024,
                ],
            ]) ?>

            
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
                            'uploadUrl' => Url::to(['/photo-library/upload-ajax']),
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

        <div class="card-footer">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
            </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>