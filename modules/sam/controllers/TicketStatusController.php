<?php

namespace app\modules\sam\controllers;

use app\modules\sam\models\TicketStatus;
use app\modules\sam\models\TicketStatusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TicketStatusController implements the CRUD actions for TicketStatus model.
 */
class TicketStatusController extends Controller
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
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TicketStatus models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TicketStatusSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TicketStatus model.
     * @param int $status_id Status ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($status_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($status_id),
        ]);
    }

    /**
     * Creates a new TicketStatus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TicketStatus();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'status_id' => $model->status_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TicketStatus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $status_id Status ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($status_id)
    {
        $model = $this->findModel($status_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'status_id' => $model->status_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TicketStatus model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $status_id Status ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($status_id)
    {
        $this->findModel($status_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TicketStatus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $status_id Status ID
     * @return TicketStatus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($status_id)
    {
        if (($model = TicketStatus::findOne(['status_id' => $status_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
