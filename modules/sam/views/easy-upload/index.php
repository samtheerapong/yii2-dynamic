<?php

use app\modules\sam\models\EasyUpload;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\sam\models\EasyUploadSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Easy Uploads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="easy-upload-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <div class="card">
        <div class="card-header bg-secondary">
            <b style="color:white"><?= Html::encode($this->title) ?></b>
        </div>
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    // [
                    //     'options' => ['style' => 'width:150px;'],
                    //     'format' => 'raw',
                    //     'attribute' => 'photo',
                    //     'value' => function ($model) {
                    //         return Html::tag('div', '', [
                    //             'style' => 'width:150px;height:95px;
                    //           border-top: 10px solid rgba(255, 255, 255, .46);
                    //           background-image:url(' . $model->photoViewer . ');
                    //           background-size: cover;
                    //           background-position:center center;
                    //           background-repeat:no-repeat;
                    //           '
                    //         ]);
                    //     }
                    // ],
                    'name',
                    'surname',
                    // 'photo',
                    // 'photos:ntext',
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'options' => ['style' => 'width:120px;'],
                        'buttonOptions' => ['class' => 'btn btn-outline-danger btn-sm'],
                        'template' => '<div class="btn-group btn-group-xs" role="group"> {view} {update} {delete}</div>',
                        'urlCreator' => function ($action, $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>