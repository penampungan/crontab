<?php
use yii\helpers\Html;
use kartik\widgets\Select2;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use kartik\widgets\Spinner;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use yii\helpers\Json;
use yii\web\Response;
use yii\widgets\Pjax;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use yii\web\View;
use yii\web\Request;

$this->registerCss("
	.kv-grid-table
	:link {
		color: #fdfdfd;
	}
	// mouse over link 
	a:hover {
		color: #5a96e7;
	}
	//selected link 
	a:active {
		color: blue;
	}
	.kv-grid-wrapper {
		position: relative;
		overflow: auto;
		height: 450px;
	}
");

$this->registerJs($this->render('modal_item.js'),View::POS_READY);
//$this->registerJs($this->render('tabx.js'),View::POS_READY);
echo $this->render('modal_item'); //echo difinition

	$aryStt= [
		  ['STATUS' => 0, 'STT_NM' => 'DISABLE'],		  
		  ['STATUS' => 1, 'STT_NM' => 'ENABLE']
	];	
	$valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
	
	$bColor='rgba(87,114,111, 1)';
	$pageNm='<span class="fa-stack fa-xs text-right" style="color:red">				  
				  <i class="fa fa-share fa-1x"></i>
				</span> <b>'.$outletNm.'</b>
	';
	
	$gvAttributeItem=[
		[
			'class'=>'kartik\grid\SerialColumn',
			'contentOptions'=>['class'=>'kartik-sheet-style'],
			'width'=>'10px',
			'header'=>'No.',
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','30px',$bColor,'#ffffff'),
			'contentOptions'=>Yii::$app->gv->gvContainBody('center','30px',''),
		],
		//ITEM NAME
		[
			'attribute'=>'ITEM_NM',
			//'label'=>'Cutomer',
			'filterType'=>true,
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','200px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColor)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','200px',$bColor),
			'contentOptions'=>Yii::$app->gv->gvContainBody('left','200px',''),
			
		]	
	];

	$gvItemPerStore=GridView::widget([
		'id'=>'gv-item-per-store',
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns'=>$gvAttributeItem,	
		'rowOptions'   => function ($model, $key, $index, $grid) {
			return ['id' => $model->ID,'onclick' => '
				var url = window.location.href.split("#")[1];	
				if(url=="tab-a"){
					$.pjax.reload({
						url: "'.Url::to(['/master/formula']).'?outlet_code=0001&id="+this.id+"#a",
						container:"#gv-harga-per-store,#dv-fharga-view"
					});
				}else if(url=="tab-b"){
					$.pjax.reload({
						url: "'.Url::to(['/master/formula']).'?outlet_code=0001&id="+this.id+"#b",
						container:"#gv-discount-detail"
					});
				}
				else{
					$.pjax.reload({
						url: "'.Url::to(['/master/formula']).'?outlet_code=0001&id="+this.id+"#tab-a",
						container:"#gv-harga-per-store"
					});
				}			
			'];
		},		
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'gv-item-per-store',
		    ],						  
		],
		'hover'=>true, //cursor select
		'responsive'=>true,
		'responsiveWrap'=>true,
		'bordered'=>true,
		'striped'=>true,
		'autoXlFormat'=>true,
		'export' => false,
		'panel'=>false,
		'toolbar' => false,
		'panel' => [
			//'heading'=>false,
			//'heading'=>tombolBack().'<div style="float:right"> '.tombolCreate().' '.tombolExportExcel().'</div>',  
			'heading'=>tombolBack().' '.$pageNm,  
			'type'=>'info',
			//'before'=> tombolBack().'<div style="float:right"> '.tombolCreate().' '.tombolExportExcel().'</div>',
			//'before'=> tombolBack(),
			'before'=>false,
			'showFooter'=>false,
		],
		
		'summary'=>false,
		'floatOverflowContainer'=>true,
		'floatHeader'=>true,
	]); 

	$gvIndex_FormulaHarga= $this->render('_indexFormulaHarga',[
		'paramCariOutlet'=>$paramCariOutlet,
		'paramCariItem'=>$paramCariItem
	]);
	$gvIndex_FormulaDiscount= $this->render('_indexFormulaDiscount',[
		'paramCariItem'=>$paramCariItem
	]);
?>

<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div class="col-xs-12 col-sm-12 col-lg-12" style="font-family: tahoma ;font-size: 9pt;">
		<div class="row">
			<div class="col-xs-6 col-sm-3 col-lg-3" style="font-family: tahoma ;font-size: 9pt;">
				<div class="row">
					<?=$gvItemPerStore?>
				</div>
			</div>
			<div class="col-xs-6 col-sm-9 col-lg-9" style="font-family: tahoma ;font-size: 9pt;">
				<div class="row">
					<?php
						$items=[
							[
								'label'=>'<i class="fa fa-sign-in fa-lg"></i>  Formula Harga','content'=>$gvIndex_FormulaHarga,
								//'active'=>$tab0,
								'options' => ['id' => 'tab-a'],
							],
							[
								'label'=>'<i class="fa fa-sign-out fa-lg"></i>  Formula Discount','content'=>$gvIndex_FormulaDiscount,
								//'active'=>$tab1,
								'options' => ['id' => 'tab-b'],
							],
							// [
								// 'label'=>'<i class="glyphicon glyphicon-briefcase"></i>  Product Forecast ','content'=>'',
								// 'options' => ['id' => 'history-tab'],
							// ]
						];
						
						echo TabsX::widget([
							'id'=>'tab-index-formula',
							'items'=>$items,
							'position'=>TabsX::POS_ABOVE,
							//'height'=>'tab-height-xs',
							'bordered'=>true,
							'encodeLabels'=>false,
							//'align'=>TabsX::ALIGN_LEFT,
							// 'pluginOptions' => [
								// 'enableCache'=>true,
								// 'cacheTimeout'=>300000
							// ],
							'enableStickyTabs' => true, //get data 'options' => ['id' => 'b'],
							// 'stickyTabsOptions' => [
								//'selectorAttribute' => ['tab'=>'data-target'],
								// 'backToTop' => true,
							// ],
						]);
					?>
				</div>
			</div>
		</div>
	</div>
</div>
