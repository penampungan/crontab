<?php 
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
//use kartik\widgets\Select2;

	$userPrmission=1;
	$aryStt= [
		  ['STATUS' => 0, 'STT_NM' => 'DISABLE'],		  
		  ['STATUS' => 1, 'STT_NM' => 'ENABLE'],
	];	
	$valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');

	/*
	* COLUMN LIST MODUL PERMISSION  PER-USER.
	* @autho Piter Novian [ptr.nov@gmail.com]
	* @since 1.2
	*/	
	$listPermissionCLm = [
		[	//COL-2
			/* Attribute Serial No */
			'class'=>'kartik\grid\SerialColumn',
			'width'=>'10px',
			'header'=>'No.',
			'hAlign'=>'center',
			'headerOptions'=>[
			'style'=>[
					'text-align'=>'center',
					'width'=>'10px',
					'font-family'=>'tahoma',
					'font-size'=>'8pt',
					'background-color'=>'rgba(0, 95, 218, 0.3)',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'10px',
					'font-family'=>'tahoma',
					'font-size'=>'8pt',
				]
			],
			'pageSummaryOptions' => [
				'style'=>[
					'border-right'=>'0px',
				]
			]
		],
		[  	'attribute' => 'BTN_VIEW',
			'label'=>'BTN VIEW',
			'filter' => $valStt,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_VIEW == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_VIEW == 0) {
					return Html::a('<i class="fa fa-lock"></i>');
					
				}
			},
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'200px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					//'background-color'=>'rgba(255, 160, 51, 1)',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'200px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
				]
			],
		],		
	];
	
	/*
	* GRIDVIEW Modul Permission.
	* @author Piter Novian [ptr.nov@gmail.com].
	* @since 1.1
	*/
	$gvPermissionModul= GridView::widget([
		'id'=>'gv-perimisson-modul-User',
		'dataProvider' => $dataProviderpermision,
		'filterModel' => $searchModelpermision,
		//'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],
		// 'floatOverflowContainer'=>true,
		// 'floatHeader'=>true,
		'columns' => $listPermissionCLm,
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>true,
				'id'=>'gv-perimisson-modul-User',
			],
		],
		'panel' => [
			'heading'=>'<i class="fa fa fa-shield fa-1x"></i> List Permission ', 
			//'type'=>'primary',
			'showFooter'=>false,
			'before'=>false
		],
		'toolbar'=> [
			//'{items}',
		],
		'hover'=>true, //cursor select
		'responsive'=>true,
		'responsiveWrap'=>true,
		'bordered'=>true,
		'striped'=>'4px',
		'export' => false,
	]);
?>
<!-- User Modul - Permission !-->
<?=$gvPermissionModul?>


