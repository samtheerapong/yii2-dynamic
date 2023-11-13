<?php

namespace app\modules\test\controllers;

use app\modules\test\models\Requester;
use app\modules\test\models\RequesterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//
use Yii;
use app\modules\test\models\Model;
use app\modules\test\models\RequestImg;
use yii\helpers\ArrayHelper;

/**
 * RequesterController implements the CRUD actions for Requester model.
 */
class RequesterController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Requester models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RequesterSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Requester model.
     * @param int $id ไอดี
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Requester model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Requester();
        $modelsRequestImg = [new RequestImg];

        if ($model->load(Yii::$app->request->post())) {
            $modelsRequestImg = Model::createMultiple(RequestImg::class);
            Model::loadMultiple($modelsRequestImg, Yii::$app->request->post());
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsRequestImg) && $valid;
            $model->save();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsRequestImg as $modelRequestImg) {
                            $modelRequestImg->requester_id  = $model->id;
                            if (!($flag = $modelRequestImg->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelsRequestImg' => (empty($modelsRequestImg)) ? [new RequestImg] : $modelsRequestImg
            ]);
        }
    }

    /**
     * Updates an existing Requester model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ไอดี
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsRequestImg = $model->requestImgs;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $oldIDs = ArrayHelper::map($modelsRequestImg, 'id', 'id');
            $modelsRequestImg = Model::createMultiple(RequestImg::classname(), $modelsRequestImg);
            Model::loadMultiple($modelsRequestImg, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsRequestImg, 'id', 'id')));

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsRequestImg) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (!empty($deletedIDs)) {
                            // CalItem::deleteAll(['id' => $deletedIDs]);
                            RequestImg::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsRequestImg as $modelRequestImg) {
                            $modelRequestImg->requester_id  = $model->id;
                            if (!($flag = $modelRequestImg->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsRequestImg' => $modelsRequestImg,
        ]);
    }

    /**
     * Deletes an existing Requester model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ไอดี
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Requester model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ไอดี
     * @return Requester the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Requester::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
