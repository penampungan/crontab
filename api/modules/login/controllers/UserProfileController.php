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
use api\modules\login\models\UserProfile;

/**
  * @author 	: ptrnov  <piter@lukison.com>
  * @since 		: 1.2
  * Subject		: UPDATE USER PROFILE
  * Metode		: PUT (UPDATE)
  * URL			: http://production.kontrolgampang.com/login/user-profiles
  * Body Param	: ACCESS_ID (key) & NM_DEPAN & NM_TENGAH & NM_BELAKANG 
  *				  & KTP & ALMAT & LAHIR_TEMPAT & LAHIR_TGL & LAHIR_GENDER & HP & EMAIL.
 */
class UserProfileController extends ActiveController
{
    public $modelClass = 'api\modules\login\models\UserProfile';
	
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

	public function actionUpdate()
    {        	
		/**
		  * @author 	: ptrnov  <piter@lukison.com>
		  * @since 		: 1.2
		  * Subject		: UPDATE USER PROFILE
		  * Metode		: PUT (UPDATE)
		  * URL			: http://production.kontrolgampang.com/login/user-profiles
		  * Body Param	: ACCESS_ID (key) & NM_DEPAN & NM_TENGAH & NM_BELAKANG 
		  *				  & KTP & ALMAT & LAHIR_TEMPAT & LAHIR_TGL & LAHIR_GENDER & HP & EMAIL.
		*/ 
		$paramsBody 			= Yii::$app->request->bodyParams;
		$in_accessId			= isset($paramsBody['ACCESS_ID'])!=''?$paramsBody['ACCESS_ID']:'';
		$namaDepan				= isset($paramsBody['NM_DEPAN'])!=''?$paramsBody['NM_DEPAN']:'';
		$namaTengah				= isset($paramsBody['NM_TENGAH'])!=''?$paramsBody['NM_TENGAH']:'';
		$namaBelakang			= isset($paramsBody['NM_BELAKANG'])!=''?$paramsBody['NM_BELAKANG']:'';
		$ktp					= isset($paramsBody['KTP'])!=''?$paramsBody['KTP']:'';
		$alamat					= isset($paramsBody['ALMAT'])!=''?$paramsBody['ALMAT']:'';
		$tempatLahir			= isset($paramsBody['LAHIR_TEMPAT'])!=''?$paramsBody['LAHIR_TEMPAT']:'';
		$tglLahir				= isset($paramsBody['LAHIR_TGL'])!=''?$paramsBody['LAHIR_TGL']:'';
		$gender					= isset($paramsBody['LAHIR_GENDER'])!=''?$paramsBody['LAHIR_GENDER']:'';
		$hp						= isset($paramsBody['HP'])!=''?$paramsBody['HP']:'';
		$email					= isset($paramsBody['EMAIL'])!=''?$paramsBody['EMAIL']:'';

		if($in_accessId){
			$modelProfile= UserProfile::find()->where(['ACCESS_ID'=>$in_accessId])->one();
			//$model->scenario = 'createuserapi';
			//$modelProfile->ACCESS_ID=$accessId;
			if ($namaDepan!=''){$modelProfile->NM_DEPAN =$namaDepan;};
			if ($namaTengah!=''){$modelProfile->NM_TENGAH =$namaTengah;};
			if ($namaBelakang!=''){$modelProfile->NM_BELAKANG=$namaBelakang;};
			if ($ktp!=''){$modelProfile->KTP=$ktp;};
			if ($alamat!=''){$modelProfile->ALMAT =$alamat;};
			if ($tempatLahir!=''){$modelProfile->LAHIR_TEMPAT=$tempatLahir;};
			if ($tglLahir!=''){$modelProfile->LAHIR_TGL=$tglLahir;};
			if ($gender!=''){$modelProfile->LAHIR_GENDER=$gender;};
			if ($hp!=''){$modelProfile->HP=$hp;};
			if ($email!=''){$modelProfile->EMAIL=$email;};
			if ($modelProfile->save()){
				$modelViews= UserProfile::find()->where(['ACCESS_ID'=>$in_accessId])->one();
				return array('PROFILE'=>$modelViews);
			}else{
				return array('result'=>$modelProfile->errors);
			} 									
		}else{
			return array('result'=>'Not Exist ACCESS_ID');
		}
	}
}


