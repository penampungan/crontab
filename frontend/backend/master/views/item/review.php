<?php
use kartik\helpers\Html;
use kartik\detail\DetailView;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use kartik\widgets\ActiveField;
use kartik\widgets\ActiveForm;
use yii\web\JsExpression;

	//Difinition Status.
	$aryStt= [
	  ['STATUS' => 0, 'STT_NM' => 'Disable'],		  
	  ['STATUS' => 1, 'STT_NM' => 'Enable']
	];
	$valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
	$valSatuan = ArrayHelper::map($model->satuanFilter, 'SATUAN_NM', 'SATUAN_NM');
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
	
	$urlx = \yii\helpers\Url::to(['/master/satuan-select']);
	$attItemReviewData=[	
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
			//'format'=>'raw',
			'type'=>DetailView::INPUT_SELECT2,
			'widgetOptions'=>[
				// 'data'=>$valSatuan,
				//'initValueText' =>'',
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>[
					'allowClear'=>true,
					// 'initialize'=>true,
					'ajax' => [
						'url' =>$urlx,
						'dataType' => 'json',
						'data' => new JsExpression('function(params) { 
								return {q:params.term,outlet_code:"'.$model->OUTLET_CODE.'"}; 
							}
						')
					],
					 // 'templateResult' => new JsExpression('function(SATUAN) { return SATUAN.text; }'),
					 // 'templateSelection' => new JsExpression('function (SATUAN) { return SATUAN.text; }'),
				],
				//'pluginLoading'=>true,
			],	
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			
		],
		[
			'attribute' =>'DEFAULT_STOCK',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			'displayOnly'=>false,	
			'format'=>'raw', 
		],
		[
			'attribute' =>'DEFAULT_HARGA',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			'displayOnly'=>false,	
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
	
	$attReviewImage = [		
		[
			'attribute' =>'image',
			'label'=>false,
			'value'=>Html::img('data:image/jpg;charset=utf-8;base64,'.$model->itemsImage64,['width'=>'100','height'=>'120']),
			'format'=>['raw',['width'=>'100','height'=>'120']],
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
	
	$dvItemReviewImage=DetailView::widget([
		'id'=>'dv-items-review-image',
		'model' => $model,
		'attributes'=>$attReviewImage,
		'condensed'=>true,
		'hover'=>true,
		'panel'=>[
			'heading'=>'<b>Tambah Gambar <b>',
			'type'=>DetailView::TYPE_INFO,
		],
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',		
		'saveOptions'=>[ 
			'id' =>'editBtnImage',
			//'value'=>'/master/item/image-save?id='.$model->ITEM_ID,
			'value'=>'/master/item/review?id='.$model->ID,
			'params' => ['custom_param' => true],
		],	
	]);
		
	$attItemReviewInfo=[
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
		
	
	
	$dvItemDataReview=DetailView::widget([
		'id'=>'dv-item-data-review',
		'model' => $model,
		'attributes'=>$attItemReviewData,
		'condensed'=>true,
		'hover'=>true,
		'panel'=>[
			'heading'=>'<b>Item Data </b>'.' '.tombolSatuan($model),
			'type'=>DetailView::TYPE_INFO,
		],
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',		
		'saveOptions'=>[ 
			'id' =>'editBtn1',
			'value'=>'/master/item/review?id='.$model->ID,
			'params' => ['custom_param' => true],
		],	 
	]);
	
	$dvItemInfoReview=DetailView::widget([
		'id'=>'dv-item-info-review',
		'model' => $model,
		'attributes'=>$attItemReviewInfo,
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
				<?=$dvItemInfoReview ?>		
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<?php
					$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL,
						'id'=>'viewedit-image',
						'enableClientValidation' => true,
						'options'=>['enctype'=>'multipart/form-data']
					]);
						echo $dvItemReviewImage;
					ActiveForm::end();
				?>
			</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?=$dvItemDataReview ?>			
		</div>
	</div>
</div>
<?php

	function tombolSatuan($data){
		$title1 = Yii::t('app',' Add Satuan');
		$options1 = [
			'value'=>url::to(['/master/item/create-satuan','id'=>$data->OUTLET_CODE]),
			'id'=>'item-button-satuan-add',					
			'class'=>"btn btn-info btn-xs",      
			'style'=>['text-align'=>'left','width'=>'100px', 'height'=>'30px','border'=> 1],
		];
		$icon1 = '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:#ffffff"></i>
				<i class="fa fa-eye fa-stack-1x" style="color:#000000"></i>
			</span>
		';      
		$label1 = $icon1 . '  ' . $title1;
		$content = Html::button($label1,$options1);		
		//return '<li>'.$content.'</li>';
		return $content;
	}	
?>


