<?php

use app\modules\sam\models\TicketStatus;
use yii\helpers\Html;
use yii\helpers\Url;
// use yii\grid\ActionColumn;
use kartik\grid\ActionColumn;
// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\sam\controllers\TicketStatusController;

/** @var yii\web\View $this */
/** @var app\modules\sam\models\TicketStatusSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Ticket Status');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-status-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <div class="row">
        <div class="col-md-2 text-center">

            <p>
                <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success btn-block']) ?>
            </p>

        </div>
    </div>
    <div class="card">


        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <div class="card-header bg-secondary">
            <b style="color:white"><?= Html::encode($this->title) ?></b>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'status_id',
                    // 'name',
                    [
                        'attribute' => 'name',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<h5><span class="badge badge-' . $model->color . '">' . $model->name . '</span></h5>';
                            // return '<h4><span class="badge " style="background-color:' . $model->color . ';">' . $model->name . '</span></h4>';
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'status_id', ArrayHelper::map(TicketStatus::find()->all(), 'status_id', 'name'), ['class' => 'form-control', 'prompt' => Yii::t('app', 'Select'),])
                    ],
                    'details:ntext',
                    // 'color',


                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'options' => ['style' => 'width:120px;'],
                        'buttonOptions' => ['class' => 'btn btn-outline-danger btn-sm'],
                        'template' => '<div class="btn-group btn-group-xs" role="group"> {view} {update} {delete}</div>',
                        'urlCreator' => function ($action, TicketStatus $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'status_id' => $model->status_id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
        <!-- <div class="card-footer bg-secondary"></div> -->
    </div>
</div>