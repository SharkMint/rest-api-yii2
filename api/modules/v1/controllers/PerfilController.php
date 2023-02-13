<?php

namespace api\modules\v1\controllers;

use api\modules\v1\models\Perfil;
use api\modules\v1\models\PerfilSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PerfilController implements the CRUD actions for Perfil model.
 */
class PerfilController extends Controller
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

        // re-add authentication filter
        $behaviors['authenticator'] = $auth;
        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];
    }

    /**
     * Lists all Perfil models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PerfilSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/perfil/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perfil model.
     * @param int $idperfil Idperfil
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idperfil)
    {
        return $this->render('/perfil/view', [
            'model' => $this->findModel($idperfil),
        ]);
    }

    /**
     * Creates a new Perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Perfil();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['/perfil/view', 'idperfil' => $model->idperfil]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('/perfil/create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Perfil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idperfil Idperfil
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idperfil)
    {
        $model = $this->findModel($idperfil);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['/perfil/view', 'idperfil' => $model->idperfil]);
        }

        return $this->render('/perfil/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Perfil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idperfil Idperfil
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idperfil)
    {
        $this->findModel($idperfil)->delete();

        return $this->redirect(['/perfil/index']);
    }

    /**
     * Finds the Perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idperfil Idperfil
     * @return Perfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idperfil)
    {
        if (($model = Perfil::findOne(['idperfil' => $idperfil])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
