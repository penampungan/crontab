<?php

namespace frontend\backend\sales\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\debug\components\search\Filter;
use yii\debug\components\search\matchers;

class TransAllStoreSearch extends Model
{	
	public $OUTLET_ID;
	public $ACCESS_UNIX;
	public $ITEM_ID;
	public $TGL;
	public $ITEM_NM;
	
    /**
     * @inheritdoc	
     */
    public function rules()
    {
        return [
            [['OTLET_CODE','ACCESS_UNIX','ITEM_ID','ITEM_NM'], 'safe'],
        ];
    }

    public function search($params){
		
		$this->OUTLET_ID='0001';
		$this->ACCESS_UNIX=Yii::$app->getUserOpt->user()['ACCESS_UNIX'];
		// $qryAllStoreItems= Yii::$app->api_dbkg->createCommand("
			// select * from VwDataTransaksi 
			// where ACCESS_UNIX='".$this->ACCESS_UNIX."' AND OUTLET_ID='".$this->OUTLET_ID."'
			// AND TGL='".$this->TGL."'
		// ")->queryAll();
		
		$qryAllStoreItems= Yii::$app->api_dbkg->createCommand("
			SELECT 
				x1.ACCESS_UNIX AS ACCESS_UNIX,x1.OUTLET_ID AS OUTLET_ID,x2.ITEM_ID AS ITEM_ID,
				x2.OUTLET_NM AS OUTLET_NM,x2.ITEM_NM AS ITEM_NM,
				x1.TRANS_ID AS TRANS_ID,x2.TRANS_DATE AS TRANS_DATE,cast(x2.TRANS_DATE as date) AS TGL,cast(x2.TRANS_DATE as time) AS WAKTU,
				x2.ITEM_QTY AS ITEM_QTY,x2.HARGA AS HARGA,x2.SATUAN AS SATUAN,x2.DISCOUNT AS DISCOUNT,x2.DISCOUNT_STT AS DISCOUNT_STT,
				x1.TYPE_PAY AS TYPE_PAY,x1.BANK_NM AS BANK_NM,x1.BANK_NO AS BANK_NO,x2.CREATE_BY AS CREATE_BY,
				x1.CONSUMER_NM AS CONSUMER_NM,x1.CONSUMER_PHONE AS CONSUMER_PHONE,x1.CONSUMER_EMAIL AS CONSUMER_EMAIL 
			FROM penjualan_header x1 join penjualan_detail x2 on (x2.ACCESS_UNIX = x1.ACCESS_UNIX) and (x2.OUTLET_ID = x1.OUTLET_ID)
			where x1.ACCESS_UNIX='".$this->ACCESS_UNIX."' 
				AND x1.OUTLET_ID='".$this->OUTLET_ID."'
				AND cast(x2.TRANS_DATE as date)='".$this->TGL."'			
		")->queryAll();
		
		$dataProvider= new ArrayDataProvider([
			'allModels'=>$qryAllStoreItems	,			
			'pagination' => [
				'pageSize' => 1000,
			]
		]);
		if (!($this->load($params) && $this->validate())) {
 			return $dataProvider;
 		}
		
		$filter = new Filter();
 		$this->addCondition($filter, 'ACCESS_UNIX', true);
 		$this->addCondition($filter, 'OUTLET_ID', true);	
 		$this->addCondition($filter, 'ITEM_NM', true);	
 		$this->addCondition($filter, 'ITEM_ID', true);	
 		$this->addCondition($filter, 'TGL', true);	
 		$dataProvider->allModels = $filter->filter($qryAllStoreItems);
		
		return $dataProvider;
	}
	
	public function addCondition(Filter $filter, $attribute, $partial = false)
    {
        $value = $this->$attribute;

        if (mb_strpos($value, '>') !== false) {
            $value = intval(str_replace('>', '', $value));
            $filter->addMatcher($attribute, new matchers\GreaterThan(['value' => $value]));

        } elseif (mb_strpos($value, '<') !== false) {
            $value = intval(str_replace('<', '', $value));
            $filter->addMatcher($attribute, new matchers\LowerThan(['value' => $value]));
        } else {
            $filter->addMatcher($attribute, new matchers\SameAs(['value' => $value, 'partial' => $partial]));
        }
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
}
