<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//
use kartik\color\ColorInput;

/** @var yii\web\View $this */
/** @var app\modules\sam\models\TicketStatus $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ticket-status-form">

    <div class="card">
        <div class="card-header bg-secondary">
            <b style="color:white"><?= Html::encode($this->title) ?></b>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'details')->textarea(['rows' => 3]) ?>

            <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

            <?php //echo $form->field($model, 'color')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'Select color ...'],]); 
            ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>