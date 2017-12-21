<?php

namespace api\modules\login\controllers;

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
use api\modules\login\models\UserOps;
use api\modules\master\models\Store;
use api\modules\login\models\User;

/**
  * @author 	: ptrnov  <piter@lukison.com>
  * @since 		: 1.2
  * Subject		: List User OPRATIONAL PER-STORE.
  * Metode		: POST (Views)
  * URL			: http://production.kontrolgampang.com/login/user-operationals
  * Body Param	: STORE_ID
  * Alert		: {"result": "Store-Empty"} 	=> Store kosong tidak di isi.
  *				  {"result": "Store-Not-Exist"}	=> Store tidak ada atau tidak ditemukan.
 */
class UserOperationalController extends ActiveController
{
    public $modelClass = 'api\modules\login\models\UserOps';
	
	/**
     * Behaviors
	 * Mengunakan Auth HttpBasicAuth.
	 * Chacking logintest.
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
					'application/json' => Response::FORMAT_JSON,
				],
			],
			'corsFilter' => [
				'class' => \yii\filters\Cors::className(),
				'cors' => [
					// restrict access to
					//'Origin' => ['http://lukisongroup.com', 'http://lukisongroup.int','http://localhost','http://103.19.111.1','http://202.53.354.82'],
					'Origin' => ['*'],
					'Access-Control-Request-Method' => ['POST', 'GET', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
					//'Access-Control-Request-Headers' => ['*'],
					'Access-Control-Request-Headers' => ['*'],
					// Allow only headers 'X-Wsse'
					'Access-Control-Allow-Credentials' => false,
					// Allow OPTIONS caching
					'Access-Control-Max-Age' => 3600,

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
		unset($actions['index'], $actions['update'], $actions['create'], $actions['delete'], $actions['view']);
		return $actions;
	} 

	public function actionCreate()
    {
		/**
		  * @author 	: ptrnov  <piter@lukison.com>
		  * @since 		: 1.2
		  * Subject		: User OPRATIONAL PER-STORE.
		  * Metode		: POST (Views)
		  * URL			: http://production.kontrolgampang.com/login/user-operationals
		  * Body Param	: STORE_ID
		  * Alert		: {"result": "Store-Empty"} 	=> Store kosong tidak di isi.
		  *				  {"result": "Store-Not-Exist"}	=> Store tidak ada atau tidak ditemukan.
		 */
		$paramsBody 			= Yii::$app->request->bodyParams;
		$storeId				= isset($paramsBody['STORE_ID'])!=''?$paramsBody['STORE_ID']:'';
		
		if($storeId){
			$cntStore= Store::find()->where(['STORE_ID'=>$storeId])->count();
			if($cntStore){
				//return array('result'=>'Show UserOps store');	
				$modalStore= Store::find()->where(['STORE_ID'=>$storeId])->one();
				$modalUserOps= UserOps::find()->where("FIND_IN_SET(ACCESS_ID,'".$modalStore->ACCESS_ID."') AND ACCESS_LEVEL!='OWNER'")->all();				
				return array('LIST_User'=>$modalUserOps); 
			}else{
				return array('result'=>'Store-Not-Exist');
			}
		}else{
			return array('result'=>'Store-Empty');
		}
	}
	
	public function actionUpdate()
    {
		/**
		  * @author 	: ptrnov  <piter@lukison.com>
		  * @since 		: 1.2
		  * Subject		: CHANGE PASSWORD OPRATIONAL.
		  * Metode		: PUT (Update)
		  * URL			: http://production.kontrolgampang.com/login/user-operationals
		  * Body Param	: ACCESS_ID (key),username(key) & password.
		  * Alert		: {"result": "ACCESS_ID-Empty"}=> Field ACCESS_ID Param tidak ada.
		  *				  {"result": "User-Not-Exist"}=> user tidak di temukan.
		  *				  {"result": "failed-save"}=> Error Saved.
		 */
		$paramsBody 		= Yii::$app->request->bodyParams;
		$accessId			= isset($paramsBody['ACCESS_ID'])!=''?$paramsBody['ACCESS_ID']:'';
		$in_username		= isset($paramsBody['username'])!=''?$paramsBody['username']:'';
		$in_password		= isset($paramsBody['password'])!=''?$paramsBody['password']:'';
		
		if($accessId){
			$cntUser= User::find()->where(['ACCESS_ID'=>$accessId,'username'=>$in_username])->count();
			if($cntUser){
				$modalUser = User::find()->where(['ACCESS_ID'=>$accessId])->one();				
				$modalUser->password_hash = Yii::$app->security->generatePasswordHash($in_password);
				if($modalUser->save()){
					$modalView = User::find()->where(['ACCESS_ID'=>$accessId])->one();
					return array('LIST_USER'=>$modalView);	
				}else{
					return array('result'=>'failed-save');
				}				
			}else{
				return array('result'=>'User-Not-Exist');
			}
		}else{
			return array('result'=>'ACCESS_ID-Empty');
		}
	}
	//PR [update (password,staus) ]
	//
}


