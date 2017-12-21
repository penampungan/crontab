<?php

namespace frontend\backend\master\models;

use Yii;

/**
 * This is the model class for table "item_64".
 *
 * @property string $ID
 * @property string $CREATE_BY USER CREATED
 * @property string $CREATE_AT Tanggal dibuat
 * @property string $UPDATE_BY USER UPDATE
 * @property string $UPDATE_AT Tanggal di update
 * @property int $STATUS
 * @property string $ITEM_ID
 * @property string $OUTLET_CODE
 * @property string $IMG64
 * @property string $IMGNM
 */
class ItemSatuan extends \yii\db\ActiveRecord
{
	public static function getDb()
    {
        return Yii::$app->get('api_dbkg');
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_satuan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['SATUAN_NM'], 'required','on'=>'create'],
            [['ACCESS_UNIX','CREATE_AT', 'UPDATE_AT','SATUAN_NM'], 'safe'],
            [['STATUS'], 'integer'],
            [['CREATE_BY', 'UPDATE_BY','OUTLET_CODE'], 'string', 'max' => 50],
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
            'OUTLET_CODE' => Yii::t('app', 'Outlet  Code'),
            'SATUAN_NM' => Yii::t('app', 'SATUAN_NM')
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
			'SATUAN_NM'=>function($model){
				return $model->SATUAN_NM;
			}	
		];
	}
}

