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
	$bColorStore='rgba(52, 235, 138, 1)';
	$listPermissionCLm=[
		[
			'class'=>'kartik\grid\SerialColumn',
			'contentOptions'=>['class'=>'kartik-sheet-style'],
			'width'=>'10px',
			'header'=>'No.',
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','10px',$bColorStore),
			'contentOptions'=>Yii::$app->gv->gvContainBody('center','10px',''),
		],
		//BTN_VIEW 
		[
			'attribute'=>'BTN_VIEW',
			'label'=>'VIEW',
			'filterType'=>false,
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_VIEW == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_VIEW == 0) {
					return Html::a('<i class="fa fa-lock"></i>');					
				}
			},
			//gvContainHeader($align,$width,$bColorStore)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','10px',$bColorStore),
			'contentOptions'=>Yii::$app->gv->gvContainBody('center','10px',''),			
		],
		//BTN_REVIEW 
		[
			'attribute'=>'BTN_REVIEW',
			'label'=>'REVIEW',
			'filterType'=>false,
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_VIEW == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_VIEW == 0) {
					return Html::a('<i class="fa fa-lock"></i>');					
				}
			},
			//gvContainHeader($align,$width,$bColorStore)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','10px',$bColorStore),
			'contentOptions'=>Yii::$app->gv->gvContainBody('center','10px',''),			
		],		
		//BTN_CREATE 
		[
			'attribute'=>'BTN_CREATE',
			'label'=>'CREATE',
			'filterType'=>false,
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_VIEW == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_VIEW == 0) {
					return Html::a('<i class="fa fa-lock"></i>');					
				}
			},
			//gvContainHeader($align,$width,$bColorStore)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','10px',$bColorStore),
			'contentOptions'=>Yii::$app->gv->gvContainBody('center','10px',''),			
		],		
		//BTN_EDIT 
		[
			'attribute'=>'BTN_EDIT',
			'label'=>'EDIT',
			'filterType'=>false,
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_VIEW == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_VIEW == 0) {
					return Html::a('<i class="fa fa-lock"></i>');					
				}
			},
			//gvContainHeader($align,$width,$bColorStore)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','10px',$bColorStore),
			'contentOptions'=>Yii::$app->gv->gvContainBody('center','10px',''),			
		],		
		//BTN_DELETE 
		[
			'attribute'=>'BTN_DELETE',
			'label'=>'DELETE',
			'filterType'=>false,
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_VIEW == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_VIEW == 0) {
					return Html::a('<i class="fa fa-lock"></i>');					
				}
			},
			//gvContainHeader($align,$width,$bColorStore)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','10px',$bColorStore),
			'contentOptions'=>Yii::$app->gv->gvContainBody('center','10px',''),			
		],		
		//BTN_SIGN1 
		[
			'attribute'=>'BTN_SIGN1',
			'label'=>'SIGN1',
			'filterType'=>false,
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_VIEW == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_VIEW == 0) {
					return Html::a('<i class="fa fa-lock"></i>');					
				}
			},
			//gvContainHeader($align,$width,$bColorStore)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','10px',$bColorStore),
			'contentOptions'=>Yii::$app->gv->gvContainBody('center','10px',''),			
		],		
		//BTN_SIGN2 
		[
			'attribute'=>'BTN_SIGN2',
			'label'=>'SIGN2',
			'filterType'=>false,
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_VIEW == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_VIEW == 0) {
					return Html::a('<i class="fa fa-lock"></i>');					
				}
			},
			//gvContainHeader($align,$width,$bColorStore)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','10px',$bColorStore),
			'contentOptions'=>Yii::$app->gv->gvContainBody('center','10px',''),			
		],		
		//BTN_SIGN3 
		[
			'attribute'=>'BTN_SIGN3',
			'label'=>'SIGN3',
			'filterType'=>false,
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_VIEW == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_VIEW == 0) {
					return Html::a('<i class="fa fa-lock"></i>');					
				}
			},
			//gvContainHeader($align,$width,$bColorStore)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','10px',$bColorStore),
			'contentOptions'=>Yii::$app->gv->gvContainBody('center','10px',''),			
		],		
		//BTN_SIGN4 
		[
			'attribute'=>'BTN_SIGN4',
			'label'=>'SIGN4',
			'filterType'=>false,
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_VIEW == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_VIEW == 0) {
					return Html::a('<i class="fa fa-lock"></i>');					
				}
			},
			//gvContainHeader($align,$width,$bColorStore)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','10px',$bColorStore),
			'contentOptions'=>Yii::$app->gv->gvContainBody('center','10px',''),			
		],		
		//BTN_SIGN5 
		[
			'attribute'=>'BTN_SIGN5',
			'label'=>'SIGN5',
			'filterType'=>false,
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>false,
			'noWrap'=>false,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_VIEW == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_VIEW == 0) {
					return Html::a('<i class="fa fa-lock"></i>');					
				}
			},
			//gvContainHeader($align,$width,$bColorStore)
			'headerOptions'=>Yii::$app->gv->gvContainHeader('center','10px',$bColorStore),
			'contentOptions'=>Yii::$app->gv->gvContainBody('center','10px',''),			
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
		//'filterModel' => $searchModelpermision,
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


