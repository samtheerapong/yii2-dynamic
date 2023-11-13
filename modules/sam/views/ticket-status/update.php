<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\sam\models\TicketStatus $model */

$this->title = Yii::t('app', 'Update Ticket Status') .' : '. $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ticket Status'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'status_id' => $model->status_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ticket-status-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
