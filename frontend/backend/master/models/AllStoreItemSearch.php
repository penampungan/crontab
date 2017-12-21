<?php

namespace frontend\backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\debug\components\search\Filter;
use yii\debug\components\search\matchers;

class AllStoreItemSearch extends Model
{	
	public $OUTLET_CODE;
	public $ACCESS_UNIX_ITEM;
	public $ITEM_ID;
	public $OUTLET_NM;
	public $ITEM_NM;
	public $SATUAN;
	public $DEFAULT_HARGA;
	public $DEFAULT_STOCK;
	
    /**
     * @inheritdoc	
     */
    public function rules()
    {
        return [
            [['OTLET_CODE','ACCESS_UNIX_ITEM','ITEM_ID'], 'safe'],
            [['OUTLET_NM','ITEM_NM','SATUAN'], 'safe'],
            [['DEFAULT_HARGA','DEFAULT_STOCK'], 'safe'],
        ];
    }

	public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'OUTLET_NM' => Yii::t('app', 'OUTLET'),
            'ACCESS_UNIX_ITEM' => Yii::t('app', 'ACCESS_UNIX'),
            'ITEM_ID' => Yii::t('app', 'ITEM_ID'),
            'ITEM_NM' => Yii::t('app', 'ITEMS'),
            
        ];
    }
	
    public function search($params){
		
		//$this->OUTLET_CODE='0001';
		$this->ACCESS_UNIX_ITEM='20170404081601';
		$qryAllStoreItems= Yii::$app->api_dbkg->createCommand("select * from VwStoreItem where ACCESS_UNIX_ITEM='".$this->ACCESS_UNIX_ITEM."'")->queryAll();
		// $qryAllStoreItems= Yii::$app->db->createCommand("select * from VwStoreItem where ACCESS_UNIX_ITEM='".$this->ACCESS_UNIX_ITEM."' AND OUTLET_CODE='".$this->OUTLET_CODE."'")->queryAll();
		
		$dataProvider= new ArrayDataProvider([
			'allModels'=>$qryAllStoreItems	,			
			'pagination' => [
				'pageSize' => 500,
			]
		]);
		if (!($this->load($params) && $this->validate())) {
 			return $dataProvider;
 		}
		
		$filter = new Filter();
 		$this->addCondition($filter, 'ACCESS_UNIX_ITEM', true);
 		$this->addCondition($filter, 'OUTLET_CODE', true);	
 		$this->addCondition($filter, 'ITEM_ID', true);	
 		$this->addCondition($filter, 'OUTLET_NM', true);	
 		$this->addCondition($filter, 'ITEM_NM', true);	
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
	
	public function addConditionX(Filter $filter, $attribute, $partial = false)
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
