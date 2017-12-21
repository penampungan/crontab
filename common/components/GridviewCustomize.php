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
class GridviewCustomize extends Component{	
	
	/**
	* ==========================================
	* Kartik Gridview Customize 
	* Customize Contain, filter
	* @author	: ptrnov  <piter@lukison.com>
	* Update	: 26/01/207	
	* ==========================================
	*/
	
	/**
	 * Column HeaderContain.
	 * Yii::$app->gv->gvContain();
	 * 'headerOptions'=>[];
	*/
	function gvContainHeader($align,$width,$bColor,$color='#060606'){	
		$rslt=[
			'style'=>[
				'color'=>$color,
				'text-align'=>$align,
				'width'=>$width,
				// 'min-width'=>$width,
				// 'max-width'=>'100%',
				//'position'=>'relative',//fixed,absolute,relative
				'font-family'=>'tahoma, arial, sans-serif',
				'font-size'=>'8pt',
				'background-color'=>$bColor,
				'float'=>'none',
							
			]				
		];	
		return $rslt;		
	}
	
	/**
	 * Column Body Contain.
	 * Yii::$app->gv->gvContain();
	 * 'contentOptionsOptions'=>[];
	*/
	function gvContainBody($align,$width,$bColor){
		$rslt=[
			'style'=>[
				'text-align'=>$align,
				'width'=>$width,
				'font-family'=>'tahoma, arial, sans-serif',
				'font-size'=>'8pt',
				'background-color'=>$bColor,
			]				//'colspan'=>'0',
		];
		return $rslt;
	}
	
	/**
	 * Column Filter Contain.
	 * Yii::$app->gv->gvContain();
	 * 'filterOptions'=>Yii::$app->gv->gvFilterContainHeader();
	*/
	function gvFilterContainHeader($colspan,$width){
		$rslt=[
			'style'=>'background-color:rgba(255, 255, 255, 1); align:center',
			'colspan'=>$colspan,
			'width'=>$width,
			'position'=>'absolute',//absolute
			//'max-width'=>'100%',
			'float'=>'none'
		];
		return $rslt;
	}
	
	/**
	 * Date plugin.
	 * 'filterWidgetOptions'=>[
	 *	 'pluginOptions' =>Yii::$app->gv->gvPliginDate(),
	 * ],
	*/
	function gvPliginDate(){
		$rslt=[
			'format' => 'yyyy-mm-dd',	
			//'format' => 'dd-mm-yyyy hh:mm',			
			'autoclose' => true,
			'todayHighlight' => true,			
			'autoWidget' => true,
			//'todayBtn' => true,			
		];
		return $rslt;
	}
	
	/**
	 * Select2 plugin.
	 * 'filterWidgetOptions'=>[
	 *	 'pluginOptions' =>Yii::$app->gv->gvPliginSelect2(),
	 * ],
	*/
	function gvPliginSelect2(){
		$rslt=[
			'allowClear'=>true,
			//'maximumInputLength' => 10
			
		];
		return $rslt;
	}
	
	/**
	 * STATUS : Disable/Enable.
	 * Array Combo
	*/
	function gvStatusArray(){
		$aryStt= [
			  ['STATUS' => 0, 'STT_NM' => 'DISABLE'],		  
			  ['STATUS' => 1, 'STT_NM' => 'ENABLE'],
			  ['STATUS' => 2, 'STT_NM' => 'PANDING'],
		];	
		$valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
		return $valStt;
	}
	
	
}