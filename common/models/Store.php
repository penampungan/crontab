<?php

namespace common\models;

use Yii;
//use frontend\backend\master\models\Item;
use api\modules\master\models\Item;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "store".
 *
 * @property integer $ID
 * @property string $CREATE_BY
 * @property string $CREATE_AT
 * @property string $UPDATE_BY
 * @property string $UPDATE_AT
 * @property integer $STATUS
 * @property integer $LOCATE
 * @property string $LOCATE_SUB
 * @property string $OUTLET_BARCODE
 * @property string $OUTLET_NM
 * @property string $ALAMAT
 * @property string $PIC
 * @property string $TLP
 */
class Store extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CREATE_AT', 'UPDATE_AT','ACCESS_UNIX','expired','countProvinsi'], 'safe'],
            [['STATUS','LOCATE_PROVINCE', 'LOCATE_CITY'], 'integer'],
            [['ALAMAT'], 'string'],
            [['CREATE_BY', 'UPDATE_BY', 'OUTLET_CODE', 'TLP'], 'string', 'max' => 50],
            [['OUTLET_NM', 'PIC'], 'string', 'max' => 100],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
			'ACCESS_UNIX' => Yii::t('app', 'ACCESS_UNIX'),
            'CREATE_BY' => Yii::t('app', 'CREATE BY'),
            'CREATE_AT' => Yii::t('app', 'CREATE AT'),
            'UPDATE_BY' => Yii::t('app', 'UPDATE BY'),
            'UPDATE_AT' => Yii::t('app', 'UPDATE AT'),
            'STATUS' => Yii::t('app', 'STATUS'),           
			'OUTLET_CODE' => Yii::t('app', 'STORE CODE'),
			'OUTLET_NM' => Yii::t('app', 'OUTLET NAME'),
            'ProvinsiNm' => Yii::t('app', 'PROVINSI'),
            'KotaNm' => Yii::t('app', 'KOTA'),
			'ALAMAT' => Yii::t('app', 'ALAMAT'),
			'PIC' => Yii::t('app', 'PIC'),
			'TLP' => Yii::t('app', 'TLP'),
			'FAX' => Yii::t('app', 'FAX'),
			'ttltems' => Yii::t('app', 'Total Items'),
			'Expired' => Yii::t('app', 'Expired')
        ];
    }
	
	//==PROVINCE==
	public function getProvinsiTbl()
	{
		return $this->hasOne(LocateProvince::className(), ['PROVINCE_ID' => 'LOCATE_PROVINCE']);
	}
	public function getProvinsiNm()
	{
		return $this->provinsiTbl!=''?$this->provinsiTbl->PROVINCE:'none';
	}
	
	//==CITY==
	public function getKotaTbl()
	{
		return $this->hasOne(LocateKota::className(), ['CITY_ID' => 'LOCATE_CITY']);
	}	
	public function getKotaNm()
	{
		return $this->kotaTbl!=''?$this->kotaTbl->CITY_NAME:'none';
	}
	public function getExpired()
	{
		return '30';
	}
	public function getTtltems()
	{
		return '12';
	}
	
	//FILTER COUNT - PROVINCE PER USER.
	public function getCountProvinsi()
	{
		if (!Yii::$app->user->isGuest){
			$rslt='';
			$cntStoreProvinsi=Store::find()->select('LOCATE_PROVINCE')->asArray()->where('FIND_IN_SET("'.Yii::$app->getUserOpt->user()['ACCESS_UNIX'].'", ACCESS_UNIX)')->all();
			//return $cntStoreProvinsi!=''?$cntStoreProvinsi['LOCATE_PROVINCE'][0]:0;
			foreach($cntStoreProvinsi as $row){
				$i=$row['LOCATE_PROVINCE'];
				$rslt=$rslt!=''?$rslt.','.$i:$i;
			}
			return $rslt;
		}else{
			return '0';
		}
	}
	
	//FILTER COUNT - Kota PER USER.
	public function getCountKota()
	{
		if (!Yii::$app->user->isGuest){
			$rslt='';
			$cntStoreKota=Store::find()->select('LOCATE_CITY')->asArray()->where('FIND_IN_SET("'.Yii::$app->getUserOpt->user()['ACCESS_UNIX'].'", ACCESS_UNIX)')->all();
			foreach($cntStoreKota as $row){
				$i=$row['LOCATE_CITY'];
				$rslt=$rslt!=''?$rslt.','.$i:$i;
			}
			return $rslt;
		}else{
			return '0';
		}
	}
		
	public function fields()
	{
		return [			
			'ACCESS_UNIX'=>function($model){
				return $model->ACCESS_UNIX;
			},
			'CREATE_BY'=>function($model){
				return $model->CREATE_BY;
			},					
			'CREATE_AT'=>function($model){
				return $model->CREATE_AT;
			},	
			'UPDATE_BY'=>function($model){
				return $model->UPDATE_BY;
			},				
			'UPDATE_AT'=>function($model){
				return $model->UPDATE_AT;
			},	
			'STATUS'=>function($model){
				return $model->STATUS;
			},
			'OUTLET_CODE'=>function($model){
				return $model->OUTLET_CODE;
			},
			'OUTLET_NM'=>function($model){
				return $model->OUTLET_NM;
			},
			'LOCATE_PROVINCE'=>function(){
				//return $model->LOCATE_PROVINCE;
				return $this->provinsiTbl!=''?$this->provinsiTbl->PROVINCE:'none';
			},	
			'LOCATE_CITY'=>function(){
				//return $this->LOCATE_CITY;
				return $this->kotaTbl!=''?$this->kotaTbl->CITY_NAME:'none';
			},		
			'ALAMAT'=>function($model){
				return $model->ALAMAT;
			},		
			'PIC'=>function($model){
				return $this->PIC;
			},		
			'TLP'=>function($model){
				return $model->TLP;
			},		
			'FAX'=>function($model){
				return $model->FAX;
			},	
			'EXPIRED'=>function($model){
				return $this->expired;
			}		
		];
	}
	
	//Join TABLE ITEM
	public function getItems(){
		//return $this->hasMany(Item::className(), ['OUTLET_CODE' => 'OUTLET_CODE']);//->from(['formula' => Item::tableName()]);
		return $this->hasMany(Item::className(), ['OUTLET_CODE' => 'OUTLET_CODE']);
		//PR STATUS=1
		//return $this->hasMany(ItemFormulaDetail::className(), ['FORMULA_ID' => 'FORMULA_ID'],['STATUS' => '1']);//->from(['formula' => Item::tableName()]);
	}
	
	public function extraFields()
	{
		return ['items','harga'];
		//return ['unit'];
	}
}
