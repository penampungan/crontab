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
use yii\db\ActiveRecord;
use yii\data\ArrayDataProvider;
use kartik\detail\DetailView;

use frontend\backend\master\models\ItemJual;
use frontend\backend\master\models\ItemJualSearch;
use frontend\backend\master\models\Item;
use frontend\backend\master\models\ItemSearch;
	$searchModelHarga = new ItemJualSearch(['ITEM_ID'=>$paramCariItem]);
    $dataProviderHarga = $searchModelHarga->search(Yii::$app->request->queryParams);

	$searchModelItemInfo = new ItemSearch(['ID'=>$paramCariItem]);
	$dataProviderItemInfo = $searchModelItemInfo->search(Yii::$app->request->queryParams);
	$modelItemInfo= $dataProviderItemInfo->getModels()[0];
	
	// $dvInfoItems=$this->render('_indexFormulaHargaView',[
		// 'paramCariOutlet'=>$paramCariOutlet,
		// 'paramCariItem'=>$paramCariItem
	// ]);
	
	$attViewFharga=[	
		[
			'columns' => [
				[
					'attribute'=>'ITEM_ID', 
					'label'=>'ITEM_ID',
					//'value'=> $dataProvider[0]['ITEM_ID'],
					'displayOnly'=>true,
					'valueColOptions'=>['style'=>'width:35%']
				],
				[
					'attribute'=>'OUTLET_CODE', 
					'format'=>'raw',
					'label'=>'START TIME',
					'valueColOptions'=>['style'=>'width:35%'], 
					'displayOnly'=>true
				],
			],
		],
		[
			'columns' => [
				[
					'attribute'=>'ITEM_NM', 
					'label'=>'SALES ACCESS_UNIX',
					'valueColOptions'=>['style'=>'width:35%'], 
					'displayOnly'=>true
				],
				[
					'attribute'=>'SATUAN',
					'format'=>'raw',
					'label'=>'END TIME',
					'valueColOptions'=>['style'=>'width:35%'], 
					'displayOnly'=>true
				],
			],
		]			
	];

	$dvViewFharga=DetailView::widget([
		'id'=>'dv-fharga-view',
		'model' => $modelItemInfo,
		'attributes'=>$attViewFharga,
		'condensed'=>true,
		'hover'=>true,
		// 'panel'=>false,
		// 'mode'=>DetailView::MODE_VIEW,
		
	]);
	
	$bColorHarga='rgba(239, 172, 26, 0.98)';
	$gvAttHarga=[
		[
			'class'=>'kartik\grid\SerialColumn',
			'contentOptions'=>['class'=>'kartik-sheet-style'],
			'width'=>'10px',
			'header'=>'No.',
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','30px',$bColorHarga,'#ffffff'),
			'contentOptions'=>Yii::$app->gv->gvContainBody('center','30px',''),
		],
		//ITEM NAME
		[
			'attribute'=>'ITEM_ID',
			//'label'=>'Cutomer',
			'filterType'=>true,
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','50px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColorHarga)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','50px',$bColorHarga),
			'contentOptions'=>Yii::$app->gv->gvContainBody('left','50px',''),
			
		]	
		,//HARI
		[
			'attribute'=>'PERIODE_TGL1',
			'filterType'=>true,
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','50px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColorHarga)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','50px',$bColorHarga),
			'contentOptions'=>Yii::$app->gv->gvContainBody('left','50px',''),
			
		]	
		,//HARI
		[
			'attribute'=>'PERIODE_TGL2',
			'filterType'=>true,
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','50px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColorHarga)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','50px',$bColorHarga),
			'contentOptions'=>Yii::$app->gv->gvContainBody('left','50px',''),			
		]	
		,//PERIODE_TGL1
		[
			'attribute'=>'HARGA_JUAL',
			'filterType'=>true,
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','50px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColorHarga)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','50px',$bColorHarga),
			'contentOptions'=>Yii::$app->gv->gvContainBody('left','50px',''),			
		]	
		,//PERIODE_TGL2
		[
			'attribute'=>'STATUS',
			'filterType'=>true,
			'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','50px'),
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			//gvContainHeader($align,$width,$bColorHarga)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','50px',$bColorHarga),
			'contentOptions'=>Yii::$app->gv->gvContainBody('left','50px',''),			
		]	
	
	];

	$gvHargaPerStore=GridView::widget([
		'id'=>'gv-harga-per-store',
		'dataProvider' => $dataProviderHarga,
		'filterModel' => $searchModelHarga,
		'columns'=>$gvAttHarga,	
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'gv-harga-per-store',
		    ],						  
		],
		'hover'=>true, //cursor select
		'responsive'=>true,
		'responsiveWrap'=>true,
		'bordered'=>true,
		'striped'=>true,
		'autoXlFormat'=>true,
		'export' => false,		
		'toolbar' => false,
		'panel'=>false,
		'summary'=>false,
		'floatOverflowContainer'=>true,
		'floatHeader'=>true,
	]); 
	
	
?>

<?=$dvViewFharga?>
<?=$gvHargaPerStore?>

