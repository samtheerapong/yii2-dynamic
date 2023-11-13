<?php

use app\modules\sam\models\Department;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

use yii\helpers\ArrayHelper;
use app\modules\sam\models\NcrStatus;
use app\modules\sam\models\Problem;

$this->title = Yii::t('app', 'NCR');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ncr-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <!-- <?php echo $this->render('_search', ['model' => $searchModel]); ?> -->

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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

                    'event_name',
                    // 'created_at:date',
                    [
                        'attribute' => 'created_at',
                        'value'=>function($model){
                          return Yii::$app->formatter->asDate($model->created_at, 'medium');
                        }
                    ],
                    // 'to_department',
                    
                    [
                        'attribute'=>'to_department',
                        'value'=>function($model){
                            return $model->todepartmentName;
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'to_department', ArrayHelper::map(Department::find()->all(), 'department_id', 'details'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                      ],
                    
                   
                    
                    // 'problem',
                    [
                        'attribute'=>'problem',
                        'value'=>function($model){
                            return $model->problemName;
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'problem', ArrayHelper::map(Problem::find()->all(), 'problem_id', 'name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                      ],
                    // 'lot',
                    // 'production_date',
                    'product_name',
                    // 'customer_name',
                    // 'detail:ntext',
                    
                    [
                        'attribute'=>'from_department',
                        'value'=>function($model){
                            return $model->fromDepartment->details;
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'from_department', ArrayHelper::map(Department::find()->all(), 'department_id', 'details'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                      ],
                    // [
                    //     'attribute' => 'from_department',
                    //     'format' => 'html',
                    //     'value' => function ($model) {
                    //         return $model->fromDpartment->details;
                    //     },
                    // ],
                    // 'status',
                    [
                        'attribute' => 'status',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<h5><span class="badge text-white" style="background-color:' . $model->ncrStatus->color . ';">' . $model->ncrStatus->status_name . '</span><h5>';
                        },
                        'filter' => Html::activeDropDownList($searchModel, 'status', ArrayHelper::map(NcrStatus::find()->all(), 'id', 'status_name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])

                    ],
                    // 'notify_by',
                    // 'proplem_date:date',
                    // 'recheck',

                    // 'customer_mobile_phone',

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'options' => ['style' => 'width:120px;'],
                        'buttonOptions' => ['class' => 'btn btn-outline-dark btn-sm'],
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