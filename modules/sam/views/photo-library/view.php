<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use dosamigos\gallery\Gallery;
use app\models\Uploads;

$this->title = $model->event_name;
$this->params['breadcrumbs'][] = ['label' => 'NCR', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ncr-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'event_name',
            'detail:ntext',
            'start_date:date',
            'end_date:date',
            'location',
            'customer_name',
            'customer_mobile_phone',
        ],
    ]) ?>
    
<div class="panel panel-default">
  <div class="panel-body">
     <?= Gallery::widget(['items' => $model->getThumbnails($model->ref,$model->event_name)]);?>
  </div>
</div>
    

</div>
