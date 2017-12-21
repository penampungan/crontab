<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

$this->registerCss("
	/**
	 * CSS - Border radius Sudut.
	 * piter novian [ptr.nov@gmail.com].
	 * 'clientOptions' => [
	 *		'backdrop' => FALSE, //Static=disable, false=enable
	 *		'keyboard' => TRUE,	// Kyboard 
	 *	]
	*/
	.modal-content { 
		border-radius: 5px;
	}
	button span {
	  pointer-events: none;  //Disable Span in Button.
	}
");


/**
* ===============================
 * Button Permission.
 * Modul ID	: 12
 * Author	: ptr.nov2gmail.com
 * Update	: 01/02/2017
 * Version	: 2.1
 * ===============================
*/
	function getPermission(){
		if (Yii::$app->getUserOpt->Modul_akses('12')){
			return Yii::$app->getUserOpt->Modul_akses('12');
		}else{
			return false;
		}
	}
	/*
	 * Backgroun Icon Color.
	*/
	function bgIconColor(){
		//return '#f08f2e';//kuning.
		return '#1eaac2';//biru Laut.
	}
	
	
/**
* ===============================
 * Button & Link Modal item
 * Author	: ptr.nov2gmail.com
 * Update	: 21/01/2017
 * Version	: 2.1
 * ===============================
*/
	/**
	 * HEADER BUTTON => Items Link Back To Store
	**/
	function tombolBack(){
		$title = Yii::t('app', 'Back');
		$url =  Url::toRoute(['/master/outlet']);
		$options = ['id'=>'item-id-back',
				  'data-pjax' => 0,
				  'class'=>"btn btn-default btn-xs",
				 // 'style'=>'margin-left:50px'
				];
		$icon = '
				<span class="fa-stack fa-sm text-left">
				  <i class="fa fa-circle fa-stack-2x" style="color:#ffffff"></i>
				  <i class="fa fa-mail-reply fa-stack-1x" style="color:#CA0605"></i>
				</span>		
		';
		$label = $icon . ' ' . $title;
		return $content = Html::a($label,$url,$options);
	}
	
	/*
	 * HEADER BUTTON : ITEMS Button - CREATE.
	*/
	function tombolCreate(){
		// if(getPermission()){
			// if(getPermission()->BTN_CREATE==1){
				$title1 = Yii::t('app', ' New');
				$url = Url::toRoute(['/master/item/create']);
				$options1 = ['value'=>$url,
							'id'=>'item-index-button-create',
							'data-pjax' => 1,
							'class'=>"btn btn-default btn-xs"  
				];
				$icon1 = '
						<span class="fa-stack fa-sm text-left">
						  <b class="fa fa-circle fa-stack-2x" style="color:#ffffff"></b>
						  <b class="fa fa-plus fa-stack-1x" style="color:#000000"></b>
						</span>			
				';
				$label1 = $icon1 . ' ' . $title1;
				$content = Html::button($label1,$options1);
				return $content;
			// }
		// }
	}
	
	/**
	 *HEADER BUTTON => Items Link Button Refresh.
	**/
	function tombolRefresh($paramUrl){
		$title = Yii::t('app', 'Refresh');
		$url =  Url::toRoute(['/master/item','outlet_code'=>$paramUrl]);
		$options = ['id'=>'item-id-refresh',
				  'data-pjax' => 0,
				  'class'=>"btn btn-default btn-xs",
				];
		$icon = '
						<span class="fa-stack fa-sm text-justify">
						  <i class="fa fa-circle fa-stack-2x" style="color:#ffffff"></i>
						  <i class="fa fa-history fa-stack-1x" style="color:#13c354"></i>
						</span>			
				';
		$label = $icon . ' ' . $title;

		return $content = Html::a($label,$url,$options);
	}
	
	
	/**
	 * ITEM HEAD - Button => Link Item-FormulaHarga.
	**/
	function tombolFHargaDiscount($paramUrl){
		$title = Yii::t('app', 'F-Harga/Discount');
		$url =  Url::toRoute(['/master/formula','outlet_code'=>$paramUrl]);
		$options = ['id'=>'item-harga-id',
				  'data-pjax' => 0,
				  'class'=>"btn btn-default btn-xs",
				 // 'style'=>'margin-left:50px'
				];
		$icon = '
				<span class="fa-stack fa-sm text-left">
				  <i class="fa fa-circle fa-stack-2x" " style="color:#ffffff"></i>
				  <i class="fa fa-list-ol fa-stack-1x "style="color:#000000"></i>
				</span>		
		';
		$label = $icon . ' ' . $title;
		return $content = Html::a($label,$url,$options);
	}
	
	/**
	 * ITEM HEAD - Button => Link Item-Formula Discount.
	**/
	function tombolFDiscount($paramUrl){
		$title = Yii::t('app', 'F-Discount');
		$url =  Url::toRoute(['/master/formula-discount','outlet_code'=>$paramUrl]);
		$options = ['id'=>'item-fdiscount-id',
				  'data-pjax' => 0,
				  'class'=>"btn btn-default btn-xs",
				 // 'style'=>'margin-left:50px'
				];
		$icon = '
				<span class="fa-stack fa-sm text-left">
				  <i class="fa fa-circle fa-stack-2x" " style="color:#ffffff"></i>
				  <i class="fa fa-list-ol fa-stack-1x "style="color:#000000"></i>
				</span>		
		';
		$label = $icon . ' ' . $title;
		return $content = Html::a($label,$url,$options);
	}
	
	/*
	 * Button - EXPORT EXCEL.
	*/
	function tombolExportExcel($paramUrl){
		// if(getPermission()){
			// if(getPermission()->BTN_PROCESS1==1){
				$title1 = Yii::t('app', ' Export Excel');
				$url = Url::toRoute(['/master/item/export-data','outlet_code'=>$paramUrl]);
				$options1 = [
							'data-pjax' => true,
							'id'=>'item-button-export-data-excel',
							'class'=>"btn btn-default btn-xs"  
				];
				$icon1 = '
						<span class="fa-stack fa-sm text-left">
						  <i class="fa fa-circle fa-stack-2x" style="color:#ffffff"></i>
						  <i class="fa fa-file-excel-o fa-stack-1x" style="color:#4b84fe"></i>
						</span>		
				';
				$label1 = $icon1 . ' ' . $title1;
				$content = Html::a($label1,$url,$options1);
				return $content;
			// }
		// }
	}	
	
	/*
	 * Row Button - VIEW.
	*/
	function tombolView($url, $model){
		// if(getPermission()){
			//Jika BTN_CREATE Show maka BTN_CVIEW Show.
			// if(getPermission()->BTN_VIEW==1 OR getPermission()->BTN_CREATE==1){
				$title1 = Yii::t('app',' View');
				$options1 = [
					'value'=>url::to(['/master/item/view','id'=>$model->ID]),
					'id'=>'item-button-view',
					'class'=>"btn btn-default btn-xs",      
					'style'=>['text-align'=>'left','width'=>'100%', 'height'=>'25px','border'=> 'none'],
				];
				$icon1 = '
					<span class="fa-stack fa-xs">																	
						<i class="fa fa-circle fa-stack-2x " style="color:'.bgIconColor().'"></i>
						<i class="fa fa-eye fa-stack-1x" style="color:#fbfbfb"></i>
					</span>
				';      
				$label1 = $icon1 . '  ' . $title1;
				$content = Html::button($label1,$options1);		
				return '<li>'.$content.'</li>';
			// }
		// }
	}
	
	/*
	 * Button - REVIEW.
	*/
	function tombolReview($url, $model){
		// if(getPermission()){
			//Jika REVIEW Show maka Bisa Update/Editing.
			// if(getPermission()->BTN_REVIEW==1){
				$title1 = Yii::t('app',' Review');
				$options1 = [
					'value'=>url::to(['/master/item/review','id'=>$model->ID]),
					'id'=>'item-button-review',
					'class'=>"btn btn-default btn-xs",      
					'style'=>['text-align'=>'left','width'=>'100%', 'height'=>'25px','border'=> 'none'],
				];
				//thin -> untuk bulet luar
				$icon1 = '
					<span class="fa-stack fa-xs">																	
						<i class="fa fa-circle fa-stack-2x " style="color:'.bgIconColor().'"></i>
						<i class="fa fa-edit fa-stack-1x" style="color:#fbfbfb"></i>
					</span>
				';      
				$label1 = $icon1 . '  ' . $title1;
				$content = Html::button($label1,$options1);		
				return '<li>'.$content.'</li>';
			// }
		// }
	}
	
	
	/*
	 * Button - DENY.
	 * Limited Access.
	 * update : 24/02/2017.
	 * PR	  : useroption invalid foreach.
	*/	
	function tombolDeny($url, $model){
		//if(Yii::$app->getUserOpt->Modul_aksesDeny('12')==0){
			$title1 = Yii::t('app',' Limited Access');
			$url = url::to(['/efenbi-rasasayang/item']);
			$options1 = [
				'value'=>$url,
				'id'=>'item-button-deny',
				'class'=>"btn btn-default btn-xs",      
				'style'=>['text-align'=>'left','width'=>'100%', 'height'=>'25px','border'=> 'none'],
			];
			$icon1 = '
				<span class="fa-stack fa-xs">																	
					<i class="fa fa-circle fa-stack-2x " style="color:#B81212"></i>
					<i class="fa fa-remove fa-stack-1x" style="color:#fbfbfb"></i>
				</span>
			';      
			$label1 = $icon1 . '  ' . $title1;
			$content = Html::button($label1,$options1);		
			return $content;
		//}
	}
	
	
	
	
	
/**
 * ===============================
 * Modal item
 * Author	: ptr.nov2gmail.com
 * Update	: 21/01/2017
 * Version	: 2.1
 * ==============================
*/
	/*
	 * item - CREATE.
	*/
	$modalHeaderColor='#fbfbfb';//' rgba(74, 206, 231, 1)';
	Modal::begin([
		'id' => 'item-modal-index-create',
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:'.bgIconColor().'"></i>
				<i class="fa fa-plus fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> CREATE NEW ITEM</b>
		',		
		'size' =>'modal-dm',
		'headerOptions'=>[
			'style'=> 'border-radius:5px; background-color:'.$modalHeaderColor,
		],
		'clientOptions' => [
			'backdrop' => FALSE, //Static=disable, false=enable
			'keyboard' => TRUE,	// Kyboard 
		]
	]);
	echo "<div id='item-modal-content-form-create'></div>";
	Modal::end();
	
	/*
	 * item - VIEW.
	*/
	Modal::begin([
		'id' => 'item-modal-view',
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:'.bgIconColor().'"></i>
				<i class="fa fa-eye fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> VIEW ITEM</b>
		',		
		'size' => 'modal-dm',
		'headerOptions'=>[
			'style'=> 'border-radius:5px; background-color:'.$modalHeaderColor,
		],
		'clientOptions' => [
			'backdrop' => FALSE, //Static=disable, false=enable
			'keyboard' => TRUE,	// Kyboard 
		]
	]);
	echo "<div id='item-modal-content-view'></div>";
	Modal::end();
	
	/*
	 * item - REVIEW.
	*/
	Modal::begin([
		'id' => 'item-modal-review',
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:'.bgIconColor().'"></i>
				<i class="fa fa-edit fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> REVIEW ITEMS</b>
		',		
		'size' =>'modal-dm',
		'headerOptions'=>[
			'style'=> 'border-radius:5px; background-color:'.$modalHeaderColor,
		],
		'clientOptions' => [
			'backdrop' => FALSE, //Static=disable, false=enable
			'keyboard' => TRUE,	// Kyboard 
		]
	]);
	echo "<div id='item-modal-content-review'></div>";
	Modal::end();
	
		
	/*
	 * item - EXPORT EXCEL.
	*/
	$modalHeaderColor='#fbfbfb';//' rgba(74, 206, 231, 1)';
	Modal::begin([
		'id' => 'item-modal-export-excel',
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:'.bgIconColor().'"></i>
				<i class="fa fa-file-excel-o fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> Export to Excel</b>
		',		
		'size' => Modal::SIZE_SMALL,
		'headerOptions'=>[
			'style'=> 'border-radius:5px; background-color:'.$modalHeaderColor,
		],
		'clientOptions' => [
			'backdrop' => FALSE, //Static=disable, false=enable
			'keyboard' => TRUE,	// Kyboard 
		]
	]);
	echo "<div id='item-modal-content-export-excel'></div>";
	Modal::end();
	
	Modal::begin([
		'id' => 'item-modal-satuan-add',		
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:#1eaac2"></i>
				<i class="fa fa-edit fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> ADD SATUAN</b>
		',//. '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>',		
		'size' =>Modal::SIZE_SMALL,		
		'headerOptions'=>[
			'style'=> 'border-radius:5px; background-color:rgba(239, 205, 93, 0.48)',
			'data-focus-on'=>'input:first',
		],
		'clientOptions' => [
			'backdrop' => FALSE, //Static=disable, false=enable
			'keyboard' => TRUE,	// Kyboard 
		]
	]);
	echo "<div id='item-content-satuan-add'  ></div>";
	Modal::end();
?>
