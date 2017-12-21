<?php 
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
//use kartik\widgets\Select2;




print_r($dataProviderpermision->getModels());

//echo "ACCESS_UNIX = ".$keyField;
	$userPrmission=1;
	$aryStt= [
		  ['STATUS' => 0, 'STT_NM' => 'DISABLE'],		  
		  ['STATUS' => 1, 'STT_NM' => 'ENABLE'],
	];	
	$valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');

		// 'dataProvider' => $dataProviderpermision,
		// 'filterModel' => $searchModelpermision,
		
/*
	* COLUMN LIST MODUL PERMISSION  PER-USER.
	* @author wawan, update Piter Novian [ptr.nov@gmail.com]
	* @since 1.1
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
		
		[  	//col-6
			//BTN_view
			// 'class'=>'kartik\grid\EditableColumn',
			'attribute' => 'BTN_VIEW',
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
			// 'readonly'=>function() use ($userPrmission) {
				   // if($userPrmission==1 OR $userPrmission==2){
						// return false;  
				   // }else{
					  // return true;  
				   // }
			// },
			// 'editableOptions' => [
				// 'header' => 'Update Permission',
				// 'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX_X,
				// 'size'=>'sm',

				// 'options' => [
				  'value' => 'Kartik Visweswaran',
				// ],
				// 'displayValueConfig'=> [
					// '1' => '<i class="fa fa-unlock "></i>',
					// '0' => '<i class="fa fa-lock"></i>',
				// ],
			// ],
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'200px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(255, 160, 51, 1)',
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
		[  	//col-6
			//BTN_REVIEW
			// 'class'=>'kartik\grid\EditableColumn',
			'attribute' => 'BTN_REVIEW',
			'label'=>'BTN REVIEW',
			'filter' => $valStt,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_REVIEW == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_REVIEW == 0) {
					return Html::a('<i class="fa fa-lock"></i>');
					
				}
			},
			// 'readonly'=>function() use ($userPrmission) {
				   // if($userPrmission==1 OR $userPrmission==2){
						// return false;  
				   // }else{
					  // return true;  
				   // }
			// },
			// 'editableOptions' => [
				// 'header' => 'Update Permission',
				// 'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX_X,
				// 'size'=>'sm',
				// 'options' => [
				// ],
				// 'displayValueConfig'=> [
					// '1' => '<i class="fa fa-unlock "></i>',
					// '0' => '<i class="fa fa-lock"></i>',
				// ],
			// ],
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'200px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(255, 160, 51, 1)',
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
		[ //BTN_CREATE
			// 'class'=>'kartik\grid\EditableColumn',
			'filter' => $valStt,
			'attribute' => 'BTN_CREATE',
			'label'=>'BTN CREATE',
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_CREATE == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_CREATE == 0) {
					return Html::a('<i class="fa fa-lock"></i>');
					
				}
			},
			// 'readonly'=>function() use ($userPrmission) {
				   // if($userPrmission==1 OR $userPrmission==2){
						// return false;  
				   // }else{
					  // return true;  
				   // }
			// },
			// 'editableOptions' => [
				// 'header' => 'CREATE',
				// 'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX_X,
				// 'size'=>'xs',
				// 'options' => [
				// ],
				// 'displayValueConfig'=> [
					// '1' => '<i class="fa fa-unlock"></i>',
					// '0' => '<i class="fa fa-lock"></i>',
				// ],
			// ],
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'200px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(255, 160, 51, 1)',
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
		[  	//col-4
			//BTN_EDIT
			// 'class'=>'kartik\grid\EditableColumn',
			'attribute' => 'BTN_EDIT',
			'label'=>'BTN EDIT',
			'filter' => $valStt,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_EDIT == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_EDIT == 0) {
					return Html::a('<i class="fa fa-lock"></i>');
					
				}
			},
			// 'readonly'=>function() use ($userPrmission) {
				   // if($userPrmission==1 OR $userPrmission==2){
						// return false;  
				   // }else{
					  // return true;  
				   // }
			// },
			// 'editableOptions' => [
			   // 'header' => 'Update Permission',
			   // 'inputType' =>\kartik\editable\Editable::INPUT_CHECKBOX_X,
			   // 'size'=>'sm',
			   // 'options' => [
			   // ],
			   // 'displayValueConfig'=> [
					   // '1' => '<i class="fa fa-unlock "></i>',
					   // '0' => '<i class="fa fa-lock"></i>',
					 // ],
			 // ],
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'200px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(255, 160, 51, 1)',
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
		[  	//col-5
			//BTN_DELETE
			// 'class'=>'kartik\grid\EditableColumn',
			'attribute' => 'BTN_DELETE',
			'label'=>'BTN DELETE',
			'filter' => $valStt,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_DELETE == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_DELETE == 0) {
					return Html::a('<i class="fa fa-lock"></i>');
					
				}
			},
			// 'readonly'=>function() use ($userPrmission) {
				   // if($userPrmission==1 OR $userPrmission==2){
						// return false;  
				   // }else{
					  // return true;  
				   // }
			// },
			// 'editableOptions' => [
			   // 'header' => 'Update Permission',
			   // 'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX_X,
			   // 'size'=>'sm',
			   // 'options' => [
			   // ],
			   // 'displayValueConfig'=> [
					// '1' => '<i class="fa fa-unlock "></i>',
					// '0' => '<i class="fa fa-lock"></i>',
				// ],
			// ],
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'200px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(255, 160, 51, 1)',
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
		[  	//col-11
			//BTN_SIGN1
			// 'class'=>'kartik\grid\EditableColumn',
			'attribute' => 'BTN_SIGN1',
			'label'=>'BTN SIGN1',
			'filter' => $valStt,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_SIGN1 == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_SIGN1 == 0) {
					return Html::a('<i class="fa fa-lock"></i>');
					
				}
			},
			// 'readonly'=>function() use ($userPrmission) {
				   // if($userPrmission==1 OR $userPrmission==2){
						// return false;  
				   // }else{
					  // return true;  
				   // }
			// },
			// 'editableOptions' => [
				// 'header' => 'Update Permission',
				// 'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX_X,
				// 'size'=>'sm',
				// 'options' => [
				// ],
				// 'displayValueConfig'=> [
					// '1' => '<i class="fa fa-unlock "></i>',
					// '0' => '<i class="fa fa-lock"></i>',
				// ],
			// ],
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'200px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(255, 160, 51, 1)',
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
		[  	//col-12
			//BTN_SIGN2
			// 'class'=>'kartik\grid\EditableColumn',
			'attribute' => 'BTN_SIGN2',
			'label'=>'BTN SIGN2',
			'filter' => $valStt,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_SIGN2 == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_SIGN2 == 0) {
					return Html::a('<i class="fa fa-lock"></i>');
					
				}
			},
			// 'readonly'=>function() use ($userPrmission) {
				   // if($userPrmission==1 OR $userPrmission==2){
						// return false;  
				   // }else{
					  // return true;  
				   // }
			// },
			// 'editableOptions' => [
				// 'header' => 'Update Permission',
				// 'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX_X,
				// 'size'=>'sm',
				// 'options' => [
				// ],
				// 'displayValueConfig'=> [
					// '1' => '<i class="fa fa-unlock "></i>',
					// '0' => '<i class="fa fa-lock"></i>',
				// ],
			// ],
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'200px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(255, 160, 51, 1)',
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
		[  	//BTN_SIGN3
			// 'class'=>'kartik\grid\EditableColumn',
			'attribute' => 'BTN_SIGN3',
			'label'=>'BTN SIGN3',
			'filter' => $valStt,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_SIGN3 == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_SIGN3 == 0) {
					return Html::a('<i class="fa fa-lock"></i>');
					
				}
			},
			// 'readonly'=>function() use ($userPrmission) {
				   // if($userPrmission==1 OR $userPrmission==2){
						// return false;  
				   // }else{
					  // return true;  
				   // }
			// },
			// 'editableOptions' => [
				// 'header' => 'BTN_SIGN3',
				// 'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX_X,
				// 'size'=>'sm',
				// 'options' => [],
				// 'displayValueConfig'=> [
					// '1' => '<i class="fa fa-unlock "></i>',
					// '0' => '<i class="fa fa-lock"></i>',
				// ],
			// ],
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'200px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(255, 160, 51, 1)',
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
		[ 	//BTN_SIGN4
			// 'class'=>'kartik\grid\EditableColumn',
			'attribute' => 'BTN_SIGN4',
			'label'=>'BTN SIGN4',
			'filter' => $valStt,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_SIGN4 == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_SIGN4 == 0) {
					return Html::a('<i class="fa fa-lock"></i>');
					
				}
			},
			// 'readonly'=>function() use ($userPrmission) {
				   // if($userPrmission==1 OR $userPrmission==2){
						// return false;  
				   // }else{
					  // return true;  
				   // }
			// },
			// 'editableOptions' => [
				// 'header' => 'BTN_SIGN4',
				// 'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX_X,
				// 'size'=>'sm',
				// 'options' => [],
				// 'displayValueConfig'=> [
					// '1' => '<i class="fa fa-unlock"></i>',
					// '0' => '<i class="fa fa-lock"></i>',
				// ],
			// ],
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'200px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(255, 160, 51, 1)',
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
		[ 	//BTN_SIGN5
			// 'class'=>'kartik\grid\EditableColumn',
			'attribute' => 'BTN_SIGN5',
			'label'=>'BTN SIGN5',
			'filter' => $valStt,
			'format' => 'raw',
			'value'=>function($model){
				if ($model->BTN_SIGN5 == 1) {
					return Html::a('<i class="fa fa-unlock "></i>');
				} else if ($model->BTN_SIGN5 == 0) {
					return Html::a('<i class="fa fa-lock"></i>');
					
				}
			},
			// 'readonly'=>function() use ($userPrmission) {
				   // if($userPrmission==1 OR $userPrmission==2){
						// return false;  
				   // }else{
					  // return true;  
				   // }
			// },
			// 'editableOptions' => [
				// 'header' => 'BTN_SIGN5',
				// 'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX_X,
				// 'size'=>'sm',
				// 'options' => [],
				// 'displayValueConfig'=> [
					// '1' => '<i class="fa fa-unlock "></i>',
					// '0' => '<i class="fa fa-lock"></i>',
				// ],
			// ],
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'200px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(255, 160, 51, 1)',
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
		[	//STATUS
			'attribute' => 'STATUS',
			'label'=>'STT',
			'filter' => $valStt,
			'format' => 'raw',
			'hAlign'=>'center',
			'value'=>function($model){
				if ($model->STATUS == 1) {
					return Html::a('<i class="fa fa-check"></i>', '',['class'=>'btn btn-success btn-xs', 'title'=>'Aktif']);
					//return Html::a('<i class="fa fa-check"></i> &nbsp;Enable', '',['class'=>'btn btn-success btn-xs', 'title'=>'Aktif']);
				} else if ($model->STATUS == 0) {
					return Html::a('<i class="fa fa-close"></i>', '',['class'=>'btn btn-danger btn-xs', 'title'=>'Deactive']);
					//return Html::a('<i class="fa fa-close"></i> &nbsp;Disable', '',['class'=>'btn btn-danger btn-xs', 'title'=>'Deactive']);
				}
			},
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'80px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(255, 160, 51, 1)',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'80px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
				]
			],
		]
	];
	
	/*
	* GRIDVIEW Modul Permission
	* @author wawan
	* @since 1.1
	*/
	$gvPermissionModul= GridView::widget([
		'id'=>'gv-perimisson-xx',
		'dataProvider' => $dataProviderpermision,
		'filterModel' => $searchModelpermision,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],
		// 'floatOverflowContainer'=>true,
		// 'floatHeader'=>true,
		'columns' => $listPermissionCLm,
		// 'pjax'=>true,
		// 'pjaxSettings'=>[
			// 'options'=>[
				// 'enablePushState'=>true,
				// 'id'=>'gv-perimisson-xx',
			// ],
		// ],
		'panel' => [
			'heading'=>'<i class="fa fa fa-shield fa-1x"></i> List Permission ', 
			'type'=>'primary',
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
		'autoXlFormat'=>true,
		'export' => false,
	]);
?>


		<!-- GROUP CUSTOMER LIST !-->
			<?=$gvPermissionModul?>


