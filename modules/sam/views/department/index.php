<?php

use app\modules\sam\models\Department;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
// use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\modules\sam\models\DepartmentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Departments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'department_id',
            'department_name',
            'details:ntext',
            // 'color',
            [
                'attribute' => 'color',
                'format' => 'html',
                'value' => function ($model) {
                    return '<h5><span class="badge text-white" style="background-color:' . $model->color . ';">' . $model->color . '</span><h5>';
                },
                'filter' => Html::activeDropDownList($searchModel, 'color', ArrayHelper::map(Department::find()->all(), 'department_id', 'color'), ['class' => 'form-control', 'prompt' => Yii::t('app', 'Select All')])

            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'options' => ['style' => 'width:120px;'],
                'buttonOptions' => ['class' => 'btn btn-outline-dark btn-sm'],
                'template' => '<div class="btn-group btn-group-xs" role="group"> {view} {update} {delete}</div>',
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'department_id' => $model->department_id]);
                }
            ],
        ],
    ]); ?>


</div>