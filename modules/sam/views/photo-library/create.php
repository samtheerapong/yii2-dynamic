<?php

use yii\helpers\Html;


$this->title = 'NCR';
$this->params['breadcrumbs'][] = ['label' => 'NCR', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ncr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'initialPreview'=>[],
        'initialPreviewConfig'=>[]
    ]) ?>

</div>
