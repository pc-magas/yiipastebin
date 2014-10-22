<?php

namespace app\controllers;

use Yii;
use app\models\Pastes;
use app\models\PastesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PastesController implements the CRUD actions for Pastes model.
 */
class PastesController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Displays a single Pastes model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
    	$model=$this->findModel($id);

        return $this->render('view', ['model' => $model,]);
    }

    /**
     * Creates a new Pastes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pastes();
		
		$data=Yii::$app->request->post();
		
		if(isset(Yii::$app->request->queryParams['refers']))
		{
			$data['Pastes']['refers']=Yii::$app->request->queryParams['refers'];
		}
		
        if ($model->load($data) && $model->save()) 
        {
        	return $this->redirect(['view', 'id' => $model->idpastes]);
        } 
        else 
        {
            return $this->render('create', ['model' => $model,]);
        }
    }


    /**
     * Finds the Pastes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pastes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pastes::findOne($id)) !== null) 
        {
            return $model;
        } 
        else 
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
}
