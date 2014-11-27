<?php

namespace app\controllers;

use Yii;
use app\models\Pastes;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\BaseUrl;


/**
 * PastesController implements the CRUD actions for Pastes model.
 */
class PastesController extends Controller
{
    public function behaviors()
    {
        return [ ];
    }
	
	public function actions()
	{
		return ['captcha'=>['class' => 'yii\captcha\CaptchaAction'],];
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

	public function actionLatest5()
	{
		$model=new Pastes();
		$data=$model->top10()->getModels();
		$sane=[];		
		
		$i=1;
		
		foreach($data as $d)
		{
			$sane["item".$i]=['id'=>$d->idpastes,
								'name'=>$d->who,
								'title'=>$d->title,
								'date'=>$d->date,
								'url'=>BaseUrl::to(['pastes/view','id'=>$d->idpastes])];
			$i++;
		}
		return \yii\helpers\Json::encode($sane);
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
