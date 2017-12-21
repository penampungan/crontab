<?php

namespace frontend\backend\master\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

use common\models\Store;
use frontend\backend\master\models\Item;
use frontend\backend\master\models\ItemSearch;
use frontend\backend\master\models\ItemSatuan;
use frontend\backend\master\models\ItemImage;
/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends Controller
{
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
	
	public function beforeAction($action){
		 $modulIndentify=4; //OUTLET
		// Check only when the user is logged in.
		// Author piter Novian [ptr.nov@gmail.com].
		if (!Yii::$app->user->isGuest){
			if (Yii::$app->session['userSessionTimeout']< time() ) {
				// timeout
				Yii::$app->user->logout();
				return $this->goHome(); 
			} else {	
				//add Session.
				Yii::$app->session->set('userSessionTimeout', time() + Yii::$app->params['sessionTimeoutSeconds']);
				//check validation [access/url].
				$checkAccess=Yii::$app->getUserOpt->UserMenuPermission($modulIndentify);
				if($checkAccess['modulMenu']['MODUL_STS']==0 OR $checkAccess['ModulPermission']['STATUS']==0){				
					$this->redirect(array('/site/alert'));
				}else{
					if($checkAccess['PageViewUrl']==true){						
						return true;
					}else{
						$this->redirect(array('/site/alert'));
					}					
				}			 
			}
		}else{
			Yii::$app->user->logout();
			return $this->goHome(); 
		}
	}
	
    /**
     * Lists all Item models.
     * @return mixed
     */
    public function actionIndex()
    {
		$paramCari=Yii::$app->getRequest()->getQueryParam('outlet_code');
		//Get 
		$modelOutlet=Store::find()->where(['OUTLET_CODE'=>$paramCari])->one();//->andWhere('FIND_IN_SET("'.$this->ACCESS_UNIX.'", ACCESS_UNIX)')->one();
		if($modelOutlet){
		    $searchModel = new ItemSearch(['OUTLET_CODE'=>$paramCari]);
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);			
		
		///OUTLET ID.
		
        return $this->render('index', [
			'outletNm'=>$modelOutlet!=''?$modelOutlet->OUTLET_NM:'none',
            'searchModel' => $searchModel!=''?$searchModel:false,
            'dataProvider' => $dataProvider,
			'paramUrl'=>$paramCari,
        ]);
		}else{
			$this->redirect(array('/site/alert'));
		}
    }

    /**
     * Displays a single Item model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
	/**
     * Displays a single Item model.
     * @param string $id
     * @return mixed
     */
    public function actionReview($id)
    {
		$model =  $model = $this->findModel($id);
        // $modelImage =ItemImage::findOne(['ACCESS_UNIX'=>$model->ACCESS_UNIX,'OUTLET_CODE'=>$model->OUTLET_CODE,'ITEM_ID'=>$model->ITEM_ID]);
		//$modelImage =ItemImage::find()->where(['ACCESS_UNIX'=>$model->ACCESS_UNIX,'OUTLET_CODE'=>$model->OUTLET_CODE,'ITEM_ID'=>$model->ITEM_ID])->one();
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->ID]);
            return $this->redirect(['index','outlet_code'=>$model->OUTLET_CODE]);
        } else {
           return $this->renderAjax('review', [
                'model' => $model,
				'modelImage'=>ItemImage::findOne(['ACCESS_UNIX'=>$model->ACCESS_UNIX,'OUTLET_CODE'=>$model->OUTLET_CODE,'ITEM_ID'=>$model->ITEM_ID]),
            ]);
        }
		
    }

	public function actionImageSave($id)
    {
        $model=ItemImage::fineOne(['ACCESS_UNIX'=>'20170404081601','OUTLET_CODE'=>'0001','ITEM_ID'=>'0003']);
		if ($model->load(Yii::$app->request->post())) {
			$editUploadImage = $model->uploadImage();
			$image64edit=$editUploadImage != ''? $this->convertBase64(file_get_contents($editUploadImage->tempName)): '';
			$model->IMG64 = $image64edit;
			$model->UPDATE_BY =  Yii::$app->user->identity->username;
			// print_r($image64edit);
			// die();
			if($model->save()){
				if ($editUploadImage !== false) {
					$path=$model->pathImage();					
					$editUploadImage->saveAs($path);
					// print_r($path);
					// die();
				}
				return $this->redirect(['index', 'id' => $model->ITEM_ID]);
			}			
        } else {
            return $this->renderAjax('view', [
				'model' => $this->findModel($id),
			]);
        }
    }
	

    /**
     * Creates a new Item model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Item();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->renderAjax('_form', [
                'model' => $model,
            ]);
        }
    }
	
	/**
     * CREATE - ITEM SATUAN 
     */
    public function actionCreateSatuan($id)
    //public function actionCreateSatuan()
    {
		$paramACCESS_GROUP=Yii::$app->getUserOpt->user()['ACCESS_GROUP'];
			
        $model = new ItemSatuan();
		if($model->load(Yii::$app->request->post())){
			if (Yii::$app->request->isAjax) {			
					$model->ACCESS_UNIX=Yii::$app->getUserOpt->user()['ACCESS_GROUP'];
					//$model->OUTLET_CODE='0001';//$id;
					$model->OUTLET_CODE=$id;
					$model->CREATE_BY=Yii::$app->getUserOpt->user()['ACCESS_UNIX'];
					$model->CREATE_AT=date('Y:m:d H:i:s');
					$model->STATUS=1;
					$model->save();			
					//if($model->save()){				
					   ///return $this->redirect(['index','outlet_code'=>$model->OUTLET_CODE]);
					   $out = Json::encode(['output'=>$model->save(), 'message'=>'suksess']);
					   // Yii::$app->session->setFlash('error', 'There was an error sending your message.');
					   return $out;
			}else{
				return $this->renderAjax('_formSatuan', [
					'model' => $model,
					'paramStore'=>$id,
					'paramACCESS_GROUP'=>$paramACCESS_GROUP
				]);			
			};
		}else{
			return $this->renderAjax('_formSatuan', [
				'model' => $model,
				'paramStore'=>$id,
				'paramACCESS_GROUP'=>$paramACCESS_GROUP
			]);			
		}
	}
    /**
     * Updates an existing Item model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Item model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Item::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
