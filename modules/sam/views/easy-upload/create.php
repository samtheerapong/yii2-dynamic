<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\sam\models\EasyUpload $model */

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Easy Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="easy-upload-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
         'initialPreview'=>[],
        'initialPreviewConfig'=>[]
    ]) ?>

</div>