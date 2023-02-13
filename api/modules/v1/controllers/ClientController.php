<?php

namespace api\modules\v1\controllers;
use yii\filters\auth\HttpBasicAuth;

use api\modules\v1\models\Client;
use api\modules\v1\models\ClientSearch;
use yii\filters\Cors;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClientController implements the CRUD actions for Client model.
 */
class ClientController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * @inheritDoc
     */

    private $_verbs = ['GET','POST','PATCH','PUT','DELETE'];
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
            'class' => Cors::class,
            'Origin' => ['*'],
            'Access-Control-Allow-Origin' => ['http://localhost:3000'],
            'Access-Control-Request-Method' => $this->_verbs,
            'Access-Control-Request-Headers' => ['X-Wsse'],
            'Access-Control-Allow-Credentials' => true,
            'Access-Control-Max-Age' => 3600,
            'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
        ];
        return $behaviors;

    }

    /**
     * Lists all Client models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ClientSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/client/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Client model.
     * @param int $idclient Idclient
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idclient)
    {
        return $this->render('/client/view', [
            'model' => $this->findModel($idclient),
        ]);
    }

    /**
     * Creates a new Client model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Client();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['/client/view', 'idclient' => $model->idclient]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('/client/create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Client model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idclient Idclient
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idclient)
    {
        $model = $this->findModel($idclient);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['/client/view', 'idclient' => $model->idclient]);
        }

        return $this->render('/client/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Client model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idclient Idclient
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idclient)
    {
        $this->findModel($idclient)->delete();

        return $this->redirect(['/client/index']);
    }

    /**
     * Finds the Client model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idclient Idclient
     * @return Client the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idclient)
    {
        if (($model = Client::findOne(['idclient' => $idclient])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
