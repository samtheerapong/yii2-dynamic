<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PhotoLibrary */

$this->title = Yii::t('app', 'NCR') . ' : ' . $model->event_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'NCR'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->event_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ncr-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'initialPreview' => $initialPreview,
        'initialPreviewConfig' => $initialPreviewConfig
    ]) ?>

</div>