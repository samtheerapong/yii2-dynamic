<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\sam\models\NcrStatus $model */

$this->title = Yii::t('app', 'Create Ncr Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ncr Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ncr-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
