<?php
use kartik\helpers\Html;
use kartik\detail\DetailView;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\widgets\Spinner;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use yii\helpers\Json;
use yii\web\Response;
use yii\widgets\Pjax;
use kartik\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\web\View;
use yii\web\Request;

$attFdiscount=[	
	[
		'columns' => [
			[
				'attribute'=>'TGL', 
				'label'=>'DATE',
				'value'=> $dataProviderInfo[0]['TGL'],
				'displayOnly'=>true,
				'valueColOptions'=>['style'=>'width:35%']
			],
			[
				//JAM MEMULAI PERJALANAN DARI DISTRIBUTOR/OTHER
				'attribute'=>'ABSEN_MASUK', 
				'format'=>'raw',
				'value'=> $dataProviderInfo[0]['ABSEN_MASUK']!=''?$dataProviderInfo[0]['ABSEN_MASUK']:"<span class='badge' style='background-color:#ff0000'>ABSENT </span>",
				'label'=>'START TIME',
				'valueColOptions'=>['style'=>'width:35%'], 
				//'displayOnly'=>true
			],
		],
	],
	[
		'columns' => [
			[
				'attribute'=>'SALES_NM', 
				'label'=>'SALES NAME',
				'value'=> $dataProviderInfo[0]['SALES_NM'],
				'valueColOptions'=>['style'=>'width:35%'], 
				'displayOnly'=>true
			],
			[
				//JAM SELESAI PERJALANAN DARI DISTRIBUTOR/OTHER
				'attribute'=>'ABSEN_KELUAR',
				'format'=>'raw',
				'value'=>$dataProviderInfo[0]['ABSEN_KELUAR']!=''?$dataProviderInfo[0]['ABSEN_KELUAR']:"<span class='badge' style='background-color:#ff0000'>ABSENT </span>",						
				'label'=>'END TIME',
				'valueColOptions'=>['style'=>'width:35%'], 
				'displayOnly'=>true
			],
		],
	]			
];

$dvFDiscount=DetailView::widget([
		'id'=>'dv-fdiscount-view',
		'model' => $model,
		'attributes'=>$attFdiscount,
		'condensed'=>true,
		'hover'=>true,
		'panel'=>false,
		// [
			// 'heading'=>'<b>Tambah Gambar <b>',
			// 'type'=>DetailView::TYPE_INFO,
		// ],
		'mode'=>DetailView::MODE_VIEW,
	]);
?>
<?=$dvFDiscount?>