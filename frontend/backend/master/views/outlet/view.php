<?php
use kartik\helpers\Html;
use kartik\detail\DetailView;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use kartik\widgets\ActiveField;
use kartik\widgets\ActiveForm;

	//Difinition Status.
	$aryStt= [
	  ['STATUS' => 0, 'STT_NM' => 'Trial'],		  
	  ['STATUS' => 1, 'STT_NM' => 'Active'],
	  ['STATUS' => 2, 'STT_NM' => 'Deactive'],
	  ['STATUS' => 3, 'STT_NM' => 'Deleted'],
	];
	$valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
	
	//Result Status value.
	function sttMsg($stt){
		if($stt==0){ //TRIAL
			 return Html::decode('<span class="fa-stack fa-xl">
					  <i class="fa fa-circle-thin fa-stack-2x"  style="color:#25ca4f"></i>
					  <i class="fa fa-check fa-stack-1x" style="color:#ee0b0b"></i>
					</span> Trial','',['title'=>'Trial']);
		}elseif($stt==1){
			 return Html::decode('<span class="fa-stack fa-xl">
					  <i class="fa fa-circle-thin fa-stack-2x"  style="color:#25ca4f"></i>
					  <i class="fa fa-check fa-stack-1x" style="color:#05944d"></i>
					</span> Active','',['title'=>'Active']);
		}elseif($stt==2){
			return Html::decode('<span class="fa-stack fa-xl">
					  <i class="fa fa-circle-thin fa-stack-2x"  style="color:#25ca4f"></i>
					  <i class="fa fa-remove fa-stack-1x" style="color:#01190d"></i>
					</span> Deactive','',['title'=>'Deactive']);
		}elseif($stt==3){
			return Html::decode('<span class="fa-stack fa-xl">
					  <i class="fa fa-circle-thin fa-stack-2x"  style="color:#25ca4f"></i>
					  <i class="fa fa-close fa-stack-1x" style="color:#ee0b0b"></i>
					</span> Delete','',['title'=>'Delete']);
		}
	};	
	
	$attSroreData=[	
		[
			'attribute' =>'OUTLET_NM',
			'type'=>DetailView::INPUT_TEXTAREA,
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			//'displayOnly'=>true,	
			'format'=>'raw', 
            //'value'=>'<kbd>'.$model->ITEM_NM.'</kbd>',
		],
		[
			'attribute' =>'ALAMAT',
			'type'=>DetailView::INPUT_TEXTAREA,
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			//'displayOnly'=>true,	
			'format'=>'raw', 
            //'value'=>'<kbd>'.$model->ITEM_NM.'</kbd>',
		],
		
		[		
			'attribute' =>'ProvinsiNm',			
			'format'=>'raw',
			'type'=>DetailView::INPUT_SELECT2,
			'widgetOptions'=>[
				//'data'=>$aryLocate,
				'options'=>['id'=>'locate-view-store-id','placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],	
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
		],
		[	
			'attribute' =>'KotaNm',			
			'format'=>'raw',
			'type'=>DetailView::INPUT_DEPDROP,
			'widgetOptions'=>[
				'options'=>['id'=>'locate-viewsub-store-id','placeholder'=>'Select ...'],
				'pluginOptions' => [
					'depends'=>['locate-view-store-id'],
					'url'=>Url::to(['/efenbi-rasasayang/store/locate-sub']),
					//'initialize'=>true,
					'loadingText' => 'Loading data ...',
				],
			],	
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
		], 
		[
			'attribute' =>'TLP',
			//'type'=>DetailView::INPUT_TEXTAREA,
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			//'displayOnly'=>true,	
			'format'=>'raw', 
            //'value'=>'<kbd>'.$model->ITEM_NM.'</kbd>',
		],
		[
			'attribute' =>'PIC',
			//'type'=>DetailView::INPUT_TEXTAREA,
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			//'displayOnly'=>true,	
			'format'=>'raw', 
            //'value'=>'<kbd>'.$model->ITEM_NM.'</kbd>',
		]		
	];
	
	$attSroreInfo=[
		[
			'attribute' =>'OUTLET_CODE',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			'displayOnly'=>true,	
			'format'=>'raw', 
            'value'=>'<kbd>'.$model->OUTLET_CODE.'</kbd>',
		],
		[
			'attribute' =>'CREATE_BY',
			'format'=>'raw', 
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			'displayOnly'=>true,
			//'value'=>'<kbd>'.$model->UPDATE_BY.'</kbd>',
		],
		[
			'attribute' =>'UPDATE_BY',
			'format'=>'raw', 
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			'displayOnly'=>true,
			//'value'=>'<kbd>'.$model->UPDATE_BY.'</kbd>',
		],		
		[
			'attribute' =>'CREATE_AT',
			'format'=>'raw',
			'type'=>DetailView::INPUT_DATETIME,
			'widgetOptions' => [
				'pluginOptions'=>Yii::$app->gv->gvPliginDate()
			],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],		
		[
			'attribute' =>'UPDATE_AT',
			'format'=>'raw',
			'displayOnly'=>true,
			'type'=>DetailView::INPUT_DATE,
			'widgetOptions' => [
				'pluginOptions'=>Yii::$app->gv->gvPliginDate()
			],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>'ttltems',
			'format'=>'raw', 
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			'displayOnly'=>true,
		],
		[
			'attribute' =>'Expired',
			'format'=>'raw', 
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			'displayOnly'=>true,
			'value'=> $model->Expired.' '.'days',
		],
		[
			'attribute' =>'STATUS',			
			'format'=>'raw',
			//'value'=>$model->STATUS==0?'Disable':($model->STATUS==1?'Enable':'Unknown'),
			'value'=>sttMsg($model->STATUS),
			'type'=>DetailView::INPUT_SELECT2,
			'widgetOptions'=>[
				'data'=>$valStt,//Yii::$app->gv->gvStatusArray(),
				'options'=>['id'=>'status-review-id','placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],	
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
		]
	];
		
	
	
	$dvStoreData=DetailView::widget([
		'id'=>'dv-store-data',
		'model' => $model,
		'attributes'=>$attSroreData,
		'condensed'=>true,
		'hover'=>true,
		'panel'=>[
			'heading'=>'<b>Outlet Data </b>',
			'type'=>DetailView::TYPE_INFO,
		],
		'mode'=>DetailView::MODE_VIEW,
		//'buttons1'=>'{update}',
		'buttons1'=>'',
		'buttons2'=>'{view}{save}',		
		/* 'saveOptions'=>[ 
			'id' =>'editBtn1',
			'value'=>'/marketing/sales-promo/review?id='.$model->ID,
			'params' => ['custom_param' => true],
		],	 */	
	]);
	
	$dvStoreInfo=DetailView::widget([
		'id'=>'dv-store-info',
		'model' => $model,
		'attributes'=>$attSroreInfo,
		'condensed'=>true,
		'hover'=>true,
		'panel'=>[
			'heading'=>'<b>System Info</b>',
			'type'=>DetailView::TYPE_INFO,
		],
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'',
		'buttons2'=>'{view}{save}'
	]);
	
	
	
?>
<div style="height:100%;font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div class="row" >
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?=$dvStoreData ?>
			<?=$dvStoreInfo ?>			
		</div>
	</div>
</div>

