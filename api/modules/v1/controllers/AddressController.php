<?php

namespace api\modules\v1\controllers;

use api\modules\v1\models\Address;
use api\modules\v1\models\AddressSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AddressController implements the CRUD actions for Address model.
 */
class AddressController extends Controller
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

        $behaviors = parent::behaviors();

        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
        ];
        return $behaviors;


    }

    /**
     * Lists all Address models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AddressSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/address/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Address model.
     * @param int $idaddress Idaddress
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idaddress)
    {
        return $this->render('/api/views/address/view', [
            'model' => $this->findModel($idaddress),
        ]);
    }

    /**
     * Creates a new Address model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Address();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['/address/view', 'idaddress' => $model->idaddress]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('/address/create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Address model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idaddress Idaddress
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idaddress)
    {
        $model = $this->findModel($idaddress);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['/address/view', 'idaddress' => $model->idaddress]);
        }

        return $this->render('/address/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Address model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idaddress Idaddress
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idaddress)
    {
        $this->findModel($idaddress)->delete();

        return $this->redirect(['/api/views/address/index']);
    }

    /**
     * Finds the Address model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idaddress Idaddress
     * @return Address the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idaddress)
    {
        if (($model = Address::findOne(['idaddress' => $idaddress])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
