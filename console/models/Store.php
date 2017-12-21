<?php

namespace console\models;

use Yii;

class Store extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store';
    }

    public static function getDb()
    {
        return Yii::$app->get('production_api');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['ACCESS_ID', 'UUID', 'PLAYER_ID', 'ALAMAT', 'DCRP_DETIL'], 'string'],
			[['INDUSTRY_ID','INDUSTRY_NM','INDUSTRY_GRP_ID'.'INDUSTRY_GRP_NM'], 'string'],
			[['DATE_START', 'DATE_END', 'CREATE_AT', 'UPDATE_AT','PPN'], 'safe'],
			[['PROVINCE_ID', 'CITY_ID', 'STATUS', 'YEAR_AT', 'MONTH_AT'], 'integer'],
			[['ACCESS_GROUP'], 'string', 'max' => 15],
			[['STORE_ID'], 'string', 'max' => 25],
			[['STORE_NM', 'PIC'], 'string', 'max' => 100],
			[['PROVINCE_NM', 'CITY_NAME', 'TLP', 'FAX', 'CREATE_BY', 'UPDATE_BY'], 'string', 'max' => 50],           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
			'ACCESS_ID' => Yii::t('app', 'ACCESS_UNIX'),
            'CREATE_BY' => Yii::t('app', 'CREATE BY'),
            'CREATE_AT' => Yii::t('app', 'CREATE AT'),
            'UPDATE_BY' => Yii::t('app', 'UPDATE BY'),
            'UPDATE_AT' => Yii::t('app', 'UPDATE AT'),
            'STATUS' => Yii::t('app', 'STATUS'),           
			'STORE_ID' => Yii::t('app', 'STORE CODE'),
			'STORE_NM' => Yii::t('app', 'OUTLET NAME'),            
			'ALAMAT' => Yii::t('app', 'ALAMAT'),
			'PIC' => Yii::t('app', 'PIC'),
			'TLP' => Yii::t('app', 'TLP'),
			'FAX' => Yii::t('app', 'FAX'),
        ];
    }
	
}
