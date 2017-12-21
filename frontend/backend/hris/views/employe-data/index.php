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

$this->registerCss("
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
            // ACCESS_UNIX_STORE, 
			// ACCESS_UNIX_ITEM,
			// OUTLET_CODE,
			// /OUTLET_NM',
			// STORE_STT,
			// DATE_START,
			// DATE_END,
			// ITEM_ID,
			// 'ITEM_NM',
			// 'SATUAN',
			//'DEFAULT_STOCK',
			// DEFAULT_HARGA,
			// ITEM_STT,
			// STORE_CREARE_BY,STORE_CREARE_AT,STORE_UPDATE_BY, STORE_UPDATE_AT,
			// ITEM_CREARE_BY,ITEM_CREARE_AT, ITEM_UPDATE_BY, ITEM_UPDATE_AT
	$bColor='rgba(87,114,111, 1)';
	$pageNm='<span class="fa-stack fa-xs text-right">				  
				  <i class="fa fa-share fa-1x"></i>
				</span><b>All-Items Outlet</b>
	';

	$gvAttDataKaryawan=[
		[
			'class'=>'kartik\grid\SerialColumn',
			'contentOptions'=>['class'=>'kartik-sheet-style'],
			'width'=>'10px',
			'header'=>'No.',
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','30px',$bColor,'#ffffff'),
			'contentOptions'=>Yii::$app->gv->gvContainBody('center','30px',''),
		],
		//EMP_ID
		[
			'attribute'=>'EMP_ID',
			'filterType'=>true,
			'format'=>'raw',
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','80px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'group'=>true,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColor)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','100px',$bColor,'#ffffff'),
			'contentOptions'=>Yii::$app->gv->gvContainBody('left','100px',''),
			
		],		
		//EMP_NM_DPN
		[
			'attribute'=>'EMP_NM_DPN',
			//'label'=>'Cutomer',
			'filterType'=>true,
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','200px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColor)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','200px',$bColor,'#ffffff'),
			'contentOptions'=>Yii::$app->gv->gvContainBody('left','200px',''),
			'value'=>function($model){
				return $model->EMP_NM_DPN .' '.$model->EMP_NM_TGH. ' '.$model->EMP_NM_BLK;
			}
			
		],		
		//EMP_KTP
		/* [
			'attribute'=>'EMP_KTP',
			//'label'=>'Cutomer',
			'filterType'=>true,
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','100px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColor)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','100px',$bColor,'#ffffff'),
			'contentOptions'=>Yii::$app->gv->gvContainBody('left','100px',''),
			
		],
		//EMP_GENDER
		[
			'attribute'=>'EMP_GENDER',
			//'label'=>'Cutomer',
			'filterType'=>true,
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','100px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColor)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','100px',$bColor,'#ffffff'),
			'contentOptions'=>Yii::$app->gv->gvContainBody('right','100px',''),
			
		],
		//EMP_STS_NIKAH
		[
			'attribute'=>'EMP_STS_NIKAH',
			//'label'=>'Cutomer',
			'filterType'=>true,
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','100px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColor)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','100px',$bColor,'#ffffff'),
			'contentOptions'=>Yii::$app->gv->gvContainBody('right','100px',''),
			
		],		
		//EMP_TLP
		[
			'attribute'=>'EMP_TLP',
			//'label'=>'Cutomer',
			'filterType'=>true,
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','100px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColor)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','100px',$bColor,'#ffffff'),
			'contentOptions'=>Yii::$app->gv->gvContainBody('right','100px',''),
			
		],
		//EMP_HP
		[
			'attribute'=>'EMP_HP',
			//'label'=>'Cutomer',
			'filterType'=>true,
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','100px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColor)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','100px',$bColor,'#ffffff'),
			'contentOptions'=>Yii::$app->gv->gvContainBody('right','100px',''),
			
		],
		//EMP_EMAIL
		[
			'attribute'=>'EMP_EMAIL',
			//'label'=>'Cutomer',
			'filterType'=>true,
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','100px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColor)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','100px',$bColor,'#ffffff'),
			'contentOptions'=>Yii::$app->gv->gvContainBody('right','100px',''),
			
		],
		//EMP_EMAIL
		[
			'attribute'=>'STATUS',
			//'label'=>'Cutomer',
			'filterType'=>true,
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','100px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColor)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','100px',$bColor,'#ffffff'),
			'contentOptions'=>Yii::$app->gv->gvContainBody('right','100px',''),
			
		]	 */	
	];
	
	$gvDatakaryawan=GridView::widget([
		'id'=>'gv-hirs-data-karyawan',
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns'=>$gvAttDataKaryawan,				
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'gv-hirs-data-karyawan',
		    ],						  
		],
		'hover'=>true, //cursor select
		'responsive'=>true,
		'responsiveWrap'=>true,
		'bordered'=>true,
		'striped'=>true,
		'autoXlFormat'=>true,
		'export' => false,
		'panel'=>[''],
		'toolbar' => false,
		'panel' => [
			//'heading'=>false,
			//'heading'=>tombolBack().'<div style="float:right"> '.tombolCreate().' '.tombolExportExcel().'</div>',  
			//'heading'=>tombolBack().' '.tombolCreate().' '.tombolExportExcel($paramUrl).' '.tombolFHargaDiscount($paramUrl).' ' .tombolFDiscount($paramUrl).' '.tombolRefresh($paramUrl).' '.$pageNm,  
			'type'=>'success',
			//'before'=> tombolBack().'<div style="float:right"> '.tombolCreate().' '.tombolExportExcel().'</div>',
			'before'=>false,
			'showFooter'=>false,
		],
		'floatOverflowContainer'=>true,
		'floatHeader'=>true,
	]); 	
?>

<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div class="col-xs-12 col-sm-12 col-lg-12" style="font-family: tahoma ;font-size: 9pt;">
		<div class="row">
			<div class="col-xs-6 col-sm-3 col-lg-3" style="font-family: tahoma ;font-size: 9pt;">
				<div class="row">
					<?=$gvDatakaryawan?>
				</div>
			</div>
			<div class="col-xs-6 col-sm-9 col-lg-9" style="font-family: tahoma ;font-size: 9pt;">
				<div class="row">
					<?php
						$items=[
							[
								'label'=>'<i class="fa fa-sign-in fa-lg"></i> Data Karyawan','content'=>'sd123',//$gvIndex_FormulaHarga,
								//'active'=>$tab0,
								'options' => ['id' => 'a'],
							],
							[
								'label'=>'<i class="fa fa-sign-out fa-lg"></i>  Formula Discount','content'=>'sd',//$gvIndex_FormulaDiscount,
								//'active'=>$tab1,
								'options' => ['id' => 'b'],
							],
							// [
								// 'label'=>'<i class="glyphicon glyphicon-briefcase"></i>  Product Forecast ','content'=>'',
								// 'options' => ['id' => 'history-tab'],
							// ]
						];
						
						echo TabsX::widget([
							'id'=>'tab-index-employee',
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
