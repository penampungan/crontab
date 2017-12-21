<?php

namespace frontend\backend\sales\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;

use frontend\backend\sales\models\TransAllStoreSearch;

class AllTransController extends Controller
{
	
	public $identifyTglSearch='';
	
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	public function beforeAction($action)
	{            
		//INIT SESSION.
		$session = new Session;		
		$this->identifyTglSearch=$session['identifyTglSearch'];
		//$this->enableCsrfValidation = false;
			

		return parent::beforeAction($action);
	}
	/**
     * Lists all Item models.
     * @return mixed
     */
    public function actionIndex()
    {
		$session = new Session;
		//$this->tanggal ='2017-04-26';//['TGL'=>'2017-04-26'];
		$model = new TransAllStoreSearch();
        if ($model->load(Yii::$app->request->post()))
        {
			$hsl = \Yii::$app->request->post();
			$tanggal = $hsl['TransAllStoreSearch']['TGL'];			
			$session->remove('identifyTglSearch');
			$session['identifyTglSearch'] = $tanggal!=''?$tanggal:date('Y:m:d');
			$this->identifyTglSearch=$session['identifyTglSearch'];
			if (Yii::$app->request->isAjax) {	
				if($tanggal){
					return 1;
				}else{
					return 0;
				}
			}
        };
		
		//$searchModel = new TransAllStoreSearch(['TGL'=>$session['identifyTglSearch']]);
		$searchModel = new TransAllStoreSearch(['TGL'=>$this->identifyTglSearch]);
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);	
			
		return $this->render('index', [
			'searchModel'=>$searchModel,
			'dataProvider' => $dataProvider,
			'model'=>$model
		]);	
		
    }
}
