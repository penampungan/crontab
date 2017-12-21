<?php
use kartik\helpers\Html;
use kartik\detail\DetailView;


use frontend\backend\master\models\Item;
use frontend\backend\master\models\ItemSearch;

	$searchModelItemInfo = new ItemSearch(['OUTLET_CODE'=>$paramCariOutlet,'ID'=>$paramCariItem]);
	$dataProviderItemInfo = $searchModelItemInfo->search(Yii::$app->request->queryParams);
	$modelItemInfo= $dataProviderItemInfo->getModels()[0];
			
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
		// 'panel'=>
		// [
			// 'heading'=>'<b>Tambah Gambar <b>',
			// 'type'=>DetailView::TYPE_INFO,
		// ],
		// 'mode'=>DetailView::MODE_VIEW,
		
	]);
?>
<?=$dvViewFharga?>