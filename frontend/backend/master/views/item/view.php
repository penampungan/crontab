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
	  ['STATUS' => 0, 'STT_NM' => 'Disable'],		  
	  ['STATUS' => 1, 'STT_NM' => 'Enable']
	];
	$valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
	
	//Result Status value.
	function sttMsg($stt){
		if($stt==0){
			 return Html::decode('<span class="fa-stack fa-xl">
					  <i class="fa fa-circle-thin fa-stack-2x"  style="color:#25ca4f"></i>
					  <i class="fa fa-remove fa-stack-1x" style="color:#ee0b0b"></i>
					</span> Disable','',['title'=>'Disable']);
		}elseif($stt==1){
			return Html::decode('<span class="fa-stack fa-xl">
					  <i class="fa fa-circle-thin fa-stack-2x"  style="color:#25ca4f"></i>
					  <i class="fa fa-check fa-stack-1x" style="color:#01190d"></i>
					</span> Enable','',['title'=>'Enable']);
		}elseif($stt==3){
			return Html::decode('<span class="fa-stack fa-xl">
					  <i class="fa fa-circle-thin fa-stack-2x"  style="color:#25ca4f"></i>
					  <i class="fa fa-close fa-stack-1x" style="color:#ee0b0b"></i>
					</span> Delete','',['title'=>'Delete']);
		}
	};	
	
	$attItemViewData=[	
		[
			'attribute' =>'ITEM_NM',
			'type'=>DetailView::INPUT_TEXTAREA,
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			//'displayOnly'=>true,	
			'format'=>'raw', 
            //'value'=>'<kbd>'.$model->ITEM_NM.'</kbd>',
		],
		[		
			'attribute' =>'SATUAN',			
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
			'attribute' =>'DEFAULT_STOCK',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			'displayOnly'=>true,	
			'format'=>'raw', 
		],
		[
			'attribute' =>'DEFAULT_HARGA',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			'displayOnly'=>true,	
			'format'=>'raw', 
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
	
	$attItemViewInfo=[
		[
			'attribute' =>'OUTLET_CODE',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			'displayOnly'=>true,	
			'format'=>'raw', 
            'value'=>'<kbd>'.$model->OUTLET_CODE.'</kbd>',
		],
		[
			'attribute' =>'ITEM_ID',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			'displayOnly'=>true,	
			'format'=>'raw', 
            'value'=>'<kbd>'.$model->ITEM_ID.'</kbd>',
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
		]		
	];
	
	$attributeImage = [		
		[
			'attribute' =>'itemsImage64',
			'label'=>false,
			'value'=>Html::img('data:image/jpg;charset=utf-8;base64,'.$model->itemsImage64,['width'=>'100','height'=>'120']),
			'format'=>['raw',['width'=>'100','height'=>'170']],
			'type' => DetailView::INPUT_FILEINPUT,
			'widgetOptions'=>[
				'pluginOptions' => [
					'showPreview' => true,
					'showCaption' => false,
					'showRemove' => false,
					'showUpload' => false
				],

			],
			//'labelColOptions' => ['style' => 'text-align:right;width: 3%']
			//'inputWidth'=>'100%',
			//'inputContainer' => ['class'=>'col-lg-5'],
		],
	];
	
	$dvItemViewImage=DetailView::widget([
			'id'=>'dv-items-view-image',
			'model' => $model,
			'attributes'=>$attributeImage,
			'condensed'=>true,
			'hover'=>true,
			'panel'=>[
				'heading'=>false,
				'type'=>DetailView::TYPE_INFO,
			],
			'mode'=>DetailView::MODE_VIEW,
			'buttons1'=>'{update}',
			'buttons2'=>'{view}{save}',		
			'saveOptions'=>[ 
				'id' =>'editBtn2',
				'value'=>'/efenbi-rasasayang/item/view?id='.$model->ITEM_ID,
				'params' => ['custom_param' => true],
			],	
		]);
	
	
	$dvItemDataView=DetailView::widget([
		'id'=>'dv-item-data-view',
		'model' => $model,
		'attributes'=>$attItemViewData,
		'condensed'=>true,
		'hover'=>true,
		'panel'=>[
			'heading'=>'<b>Item Data </b>',
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
	
	$dvItemInfoView=DetailView::widget([
		'id'=>'dv-item-info-view',
		'model' => $model,
		'attributes'=>$attItemViewInfo,
		'condensed'=>true,
		'hover'=>true,
		'panel'=>[
			'heading'=>'<b>Item Info</b>',
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
			<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
				<?=$dvItemInfoView ?>		
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<?=$dvItemViewImage ?>
			</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?=$dvItemDataView ?>			
		</div>
	</div>
</div>

