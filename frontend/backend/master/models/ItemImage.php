<?php

namespace frontend\backend\master\models;

use Yii;
use yii\web\UploadedFile;

Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/backend/master/image/';
 
class ItemImage extends \yii\db\ActiveRecord
{
	public $imageTmp;
	
	public static function getDb()
    {
        return Yii::$app->get('api_dbkg');
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_64';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ACCESS_UNIX','CREATE_AT', 'UPDATE_AT','imageTmp'], 'safe'],
            [['STATUS'], 'integer'],
            [['IMG64', 'IMGNM'], 'string'],
            [['CREATE_BY', 'UPDATE_BY', 'ITEM_ID', 'OUTLET_CODE'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CREATE_BY' => Yii::t('app', 'Create  By'),
            'CREATE_AT' => Yii::t('app', 'Create  At'),
            'UPDATE_BY' => Yii::t('app', 'Update  By'),
            'UPDATE_AT' => Yii::t('app', 'Update  At'),
            'STATUS' => Yii::t('app', 'Status'),
            'ACCESS_UNIX' => Yii::t('app', 'Access Unix'),
            'ITEM_ID' => Yii::t('app', 'Item  ID'),
            'OUTLET_CODE' => Yii::t('app', 'Outlet  Code'),
            'IMG64' => Yii::t('app', 'IMAGE'),
            'IMGNM' => Yii::t('app', 'Imgnm'),
        ];
    }
	public function fields()
	{
		return [			
			'CREATE_AT'=>function($model){
				return $model->CREATE_AT;
			},
			'UPDATE_AT'=>function($model){
				return $model->UPDATE_AT;
			},					
			'IMG64'=>function($model){
				return $model->IMG64!=''?$model->IMG64:$this->blankImage;
			}	
		];
	}
	
	
	
}

