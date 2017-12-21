<?php
/**
 * Created by PhpStorm.
 * User: ptr.nov
 * Date: 10/08/15
 * Time: 19:44
 */

namespace common\components;
use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\base\Component;
use Yii\base\Model;
use yii\data\ArrayDataProvider;


/** 
  * ARRAY HELEPER CUSTOMIZE
  * @author ptrnov  <piter@lukison.com>
  * @since 1.1
*/
class ArrayBantuan extends Component{	
	/**
	 * Array Sort
	 * Yii::$app->arrayBantuan->array_group_by($arr, $key)
	*/
	public static function array_group_by($arr, $key)
	{
		if (!is_array($arr)) {
			trigger_error('array_group_by(): The first argument should be an array', E_USER_ERROR);
		}
		if (!is_string($key) && !is_int($key) && !is_float($key)) {
			trigger_error('array_group_by(): The key should be a string or an integer', E_USER_ERROR);
		}
		// Load the new array, splitting by the target key
		$grouped = [];
		foreach ($arr as $value) {
			$grouped[$value[$key]][] = $value;
		}
		// Recursively build a nested grouping if more parameters are supplied
		// Each grouped array value is grouped according to the next sequential key
		if (func_num_args() > 2) {
			$args = func_get_args();
			foreach ($grouped as $key => $value) {
				$parms = array_merge([$value], array_slice($args, 2, func_num_args()));
				$grouped[$key] = call_user_func_array('array_group_by', $parms);
			}
		}
		return $grouped;
	}
	
	/**
	 * Find content on Column.
	 * Author	: ptr.nov@gmail.com.
	 * Update	: 15/02/2017.
	 *  Yii::$app->arrayBantuan->array_find($arr, $key,$value)
	*/
	function array_find($array, $keys, $searchContent)
	{	
		$rslt=[];
		foreach($array as $key => $value) {
			if(trim($value[$keys])===trim($searchContent)){
				$rslt[]=$value;
			}
		}
		return $rslt;
	}
}