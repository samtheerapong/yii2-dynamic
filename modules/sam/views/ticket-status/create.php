<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\sam\models\TicketStatus $model */

$this->title = Yii::t('app', 'New Ticket Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ticket Status'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-status-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
