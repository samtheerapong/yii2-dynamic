<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use dosamigos\gallery\Gallery;

/** @var yii\web\View $this */
/** @var app\modules\sam\models\EasyUpload $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Easy Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="easy-upload-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="card">
        <div class="card-header bg-secondary">
            <b style="color:white"><?= $model->id . '.' . Html::encode($this->title) ?></b>
        </div>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'surname',
                    // 'photo',
                    // [
                    //     'format' => 'raw',
                    //     'attribute' => 'photo',
                    //     'value' => Html::img($model->photoViewer, ['class' => 'img-thumbnail', 'style' => 'width:200px;'])
                    // ]
                    // 'photos:ntext',
                ],
            ]) ?>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <?= dosamigos\gallery\Gallery::widget(['items' => $model->getThumbnails($model->ref, $model->event_name)]); ?>
            </div>
        </div>

    </div>
</div>