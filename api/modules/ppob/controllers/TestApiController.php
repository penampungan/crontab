<?php

namespace api\modules\ppob\controllers;

use yii;
use yii\helpers\Json;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\web\HttpException;

use api\modules\ppob\models\ApiTableTest;

class TestApiController extends ActiveController
{

	public $modelClass = 'api\modules\ppob\models\ApiTableTest';

	/**
     * Behaviors
	 * Mengunakan Auth HttpBasicAuth.
	 * Chacking kontrolgampang\login.
     */
    public function behaviors()    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authenticator' => 
            [
                'class' => CompositeAuth::className(),
				'authMethods' => 
                [
                    #Hapus Tanda Komentar Untuk Autentifikasi Dengan Token               
                   // ['class' => HttpBearerAuth::className()],
                   // ['class' => QueryParamAuth::className(), 'tokenParam' => 'access-token'],
                ],
                'except' => ['options']
            ],
			'bootstrap'=> 
            [
				'class' => ContentNegotiator::className(),
				'formats' => 
                [
					'application/json' => Response::FORMAT_JSON,"JSON_PRETTY_PRINT"
				],
				
			],
			'corsFilter' => [
				'class' => \yii\filters\Cors::className(),
				'cors' => [
					// restrict access to
					'Origin' => ['*','http://localhost:810'],
					'Access-Control-Request-Method' => ['POST', 'PUT','GET'],
					// Allow only POST and PUT methods
					'Access-Control-Request-Headers' => ['X-Wsse'],
					// Allow only headers 'X-Wsse'
					'Access-Control-Allow-Credentials' => true,
					// Allow OPTIONS caching
					'Access-Control-Max-Age' => 3600,
					// Allow the X-Pagination-Current-Page header to be exposed to the browser.
					'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
				]		
			],
			/* 'corsFilter' => [
				'class' => \yii\filters\Cors::className(),
				'cors' => [
					'Origin' => ['*'],
					'Access-Control-Allow-Headers' => ['X-Requested-With','Content-Type'],
					'Access-Control-Request-Method' => ['POST', 'GET', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
					//'Access-Control-Request-Headers' => ['*'],					
					'Access-Control-Allow-Credentials' => true,
					'Access-Control-Max-Age' => 3600,
					'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page']
					]		 
			], */
        ]);		
    }
	
	public function actions()
	 {
		 $actions = parent::actions();
		 unset($actions['index']);//, $actions['update']);
		 //, $actions['create'], $actions['delete'], $actions['view']);
		 //unset($actions['update'], $actions['create'], $actions['delete'], $actions['view']);
		 return $actions;
	 }
	
	public function actionIndex()
	{
		$model= ApiTableTest::find()->all();
		return $model;
	}
	
	public function actionUpdate()
    {  
		/**
		  * @author 		: ptrnov  <piter@lukison.com>
		  * @since 			: 1.2
		  * Subject			: CUSTOMER PER-STORE
		  * Metode			: PUT (Update)
		  * URL				: http://production.kontrolgampang.com/master/customers
		  * Body Param		: CUSTOMER_ID(Key)
		 */
		// $paramsBody 	= Yii::$app->request->bodyParams;		
		// $id				= isset($paramsBody['ID'])!=''?$paramsBody['ID']:'';		
		// $nama			= isset($paramsBody['NAMA'])!=''?$paramsBody['NAMA']:'';
		$params     	= $_REQUEST;
		$paramsHeader	= Yii::$app->request->headers;
		$paramsBody 	= Yii::$app->request->bodyParams;		
		
		$id			= $paramsHeader['ID']!=''?$paramsHeader['ID']:$paramsBody['ID'];
		$nama		= $paramsHeader['NAMA']!=''?$paramsHeader['NAMA']:$paramsBody['NAMA'];
		
		$modelCustomer= ApiTableTest::find()->where(['ID'=>$id])->one();
		if($modelCustomer){
			//$modelMerchant->BANK_NM='ok zone1';
			if ($nama!=''){$modelCustomer->NAMA=$nama;}
			if($modelCustomer->save()){
				$modelView=ApiTableTest::find()->where(['ID'=>$id])->one();				
				return $modelView;
			}else{
				return array('result'=>$modelCustomer->errors);
			}
		}else{
			return array('result'=>'Customer-Not-Exist');
		};			
	}
	
}
    
	
	
	
	
