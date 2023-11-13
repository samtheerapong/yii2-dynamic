<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\test\models\Requester $model */

$this->title = Yii::t('app', 'Requester');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Requesters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requester-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'modelsRequestImg' => $modelsRequestImg,
    ]) ?>

</div>
