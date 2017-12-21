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
class StatusCode extends Component{	
	/**
	 * STATUS CODE.
	 * Yii::$app->StatusCode->apihandling($key)
	*/
	public static function apihandling($code)
	{
		switch ($code) {
			case 204: return ['status'=>'204','message'=> 'Not Data Content']; break;		//Tidak ada Data.
			case 401: return ['status'=>'401','message'=> 'Unauthorized']; break;			// Data atau Attribute tidak di temukan.
			case 404: return ['status'=>'404','message'=> 'Not Found']; break;			// Data atau Attribute tidak di temukan.
		}
	}
	
	
}