<?php

namespace frontend\backend\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\debug\components\search\Filter;
use yii\debug\components\search\matchers;


use frontend\backend\master\models\Item;

/**
 * PersonallogSearch represents the model behind the search form about `lukisongroup\hrd\models\Personallog`.
 */
class SatuanSelect extends Model
{	
	public $id;
	public $text;
	
    /**
     * @inheritdoc	
     */
    public function rules()
    {
        return [
            [['id','text'], 'safe'],
        ];
    }

    public function search($params){
		
		$model = Item::findOne('0001');//()->where(['outlet_code'=>'0001'])->All();		
		$valSatuan = $model->satuanFilter;//
		
		foreach($valSatuan as $row => $val){
			$data[]=['id'=>$val['SATUAN_NM'],'text'=>$val['SATUAN_NM']];			 
		};	
		
		$dataProvider= new ArrayDataProvider([
			'allModels'=>$data	,			
			'pagination' => [
				'pageSize' => 500,
			]
		]);
		if (!($this->load($params) && $this->validate())) {
 			return $dataProvider;
 		}
		
		$filter = new Filter();
 		$this->addCondition($filter, 'id', true);
 		$this->addCondition($filter, 'text', true);	
 		$dataProvider->allModels = $filter->filter($data);
		
		return $dataProvider->getModels();
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
