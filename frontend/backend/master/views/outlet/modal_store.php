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
	
");

/**
* ===============================
 * Button Permission.
 * Modul ID	: 11
 * Author	: ptr.nov2gmail.com
 * Update	: 01/02/2017
 * Version	: 2.1
 * ===============================
*/
	function getPermission(){
		if (Yii::$app->getUserOpt->Modul_akses('11')){
			return Yii::$app->getUserOpt->Modul_akses('11');
		}else{
			return false;
		}
	}
	/*
	 * Backgroun Icon Color.
	*/
	function bgIconColor(){
		//return '#f08f2e';//kuning.
		//return '#1eaac2';//biru Laut.
		return '#25ca4f';//Hijau.
	}
	
	
/**
* ===============================
 * Button & Link Modal store
 * Author	: ptr.nov2gmail.com
 * Update	: 21/01/2017
 * Version	: 2.1
 * ===============================
*/
	/**
	 * HEADER BUTTON : STORE - REGISTER STORE
	*/
	function tombolReqStore(){
		$title = Yii::t('app', 'Ragister New Store');
		$url =  Url::toRoute(['/payment/status']);
		$options = ['id'=>'store-id-register',
				  'data-pjax' => 0,
				  'class'=>"btn btn-success btn-xs",
				];
		$icon = '<span class="fa fa-check-circle fa-lg"></span>';
		$label = $icon . ' ' . $title;

		return $content = Html::a($label,$url,$options);
	}
	
	//HEADER BUTTON : Link Button Refresh 
	function tombolRefresh(){
		$title = Yii::t('app', 'Refresh');
		$url =  Url::toRoute(['/master/outlet']);
		$options = ['id'=>'store-id-refresh',
				  'data-pjax' => 0,
				  'class'=>"btn btn-info btn-xs",
				];
		$icon = '<span class="fa fa-history fa-lg"></span>';
		$label = $icon . ' ' . $title;

		return $content = Html::a($label,$url,$options);
	}
	
	/*
	 * HEADER BUTTON : Button - EXPORT EXCEL.
	*/
	function tombolExportExcel(){
		// if(getPermission()){
			// if(getPermission()->BTN_PROCESS1==1){
				$title1 = Yii::t('app', ' Export Excel');
				$url = Url::toRoute(['/efenbi-rasasayang/store/export']);
				$options1 = [
							'id'=>'store-button-export-excel',
							'data-pjax' => true,
							'class'=>"btn btn-info btn-xs"  
				];
				$icon1 = '<span class="fa fa-file-excel-o fa-lg"></span>';
				$label1 = $icon1 . ' ' . $title1;
				$content = Html::a($label1,$url,$options1);
				return $content;
			// }
		// }
	}	
		
	/*
	 *  ROWS BUTTON : Store - VIEW.
	*/
	function tombolView($url, $model){
		// if(getPermission()){
			//Jika BTN_CREATE Show maka BTN_CVIEW Show.
			// if(getPermission()->BTN_VIEW==1 OR getPermission()->BTN_CREATE==1){
				$title1 = Yii::t('app',' View');
				$options1 = [
					'value'=>url::to(['/master/outlet/view','id'=>$model->ID]),
					'id'=>'store-button-view',
					'class'=>"btn btn-default btn-xs",    
					'style'=>['text-align'=>'left','width'=>'100%', 'height'=>'25px','border'=> 'none'],
				];
				$icon1 = '
					<span class="fa-stack fa-xs">																	
						<i class="fa fa-circle-thin fa-stack-2x " style="color:'.bgIconColor().'"></i>
						<i class="fa fa-eye fa-stack-1x" style="color:black"></i>
					</span>
				';      
				$label1 = $icon1 . '  ' . $title1;
				$content = Html::button($label1,$options1);		
				return '<li>'.$content.'</li>';
			// }
		// }
	}
	
	/*
	 *  ROWS BUTTON : Store - VIEW.
	*/
	function tombolItems($url, $model){
		// if(getPermission()){
			//Jika BTN_CREATE Show maka BTN_CVIEW Show.
			// if(getPermission()->BTN_VIEW==1 OR getPermission()->BTN_CREATE==1){
				$title1 = Yii::t('app',' Items');
				$url = url::to(['/master/item','outlet_code'=>$model->OUTLET_CODE]);
				$options1 = [
					//'value'=>url::to(['/master/item','outlet_code'=>$model->OUTLET_CODE]),
					'id'=>'store-button-item',
					'class'=>"btn btn-default btn-xs",    
					'style'=>['text-align'=>'left','width'=>'100%', 'height'=>'28px','border'=> 'none'],
				];
				$icon1 = '
					<span class="fa-stack fa-xs">																	
						<i class="fa fa-circle-thin fa-stack-2x " style="color:'.bgIconColor().'"></i>
						<i class="fa fa-edit fa-stack-1x" style="color:black"></i>
					</span>
				';      
				$label1 = $icon1 . '  ' . $title1;
				$content = Html::a($label1,$url,$options1);		
				return $content;
			// }
		// }
	}
	
	/*
	 *  ROWS BUTTON : Store - REVIEW.
	*/
	function tombolReview($url, $model){
		// if(getPermission()){
			//Jika REVIEW Show maka Bisa Update/Editing.
			// if(getPermission()->BTN_REVIEW==1){
				$title1 = Yii::t('app',' Review');
				$options1 = [
					'value'=>url::to(['/master/outlet/review','id'=>$model->ID]),
					'id'=>'store-button-review',
					'class'=>"btn btn-default btn-xs",      
					'style'=>['text-align'=>'left','width'=>'100%', 'height'=>'25px','border'=> 'none'],
				];
				//thin -> untuk bulet luar
				$icon1 = '
					<span class="fa-stack fa-xs">																	
						<i class="fa fa-circle-thin fa-stack-2x " style="color:'.bgIconColor().'"></i>
						<i class="fa fa-edit fa-stack-1x" style="color:black"></i>
					</span>
				';      
				$label1 = $icon1 . '  ' . $title1;
				$content = Html::button($label1,$options1);		
				return '<li>'.$content.'</li>';
			// }
		// }
	}
	
	/**
	 * ROWS BUTTON : STORE - PAYMENT (per-Store).
	*/
	function tombolPayment($model){
		$title = Yii::t('app', 'Payment');
		$url =  Url::toRoute(['/payment/status','outlet_code'=>$model->OUTLET_CODE]);
		$options = ['id'=>'store-id-payment',
				  'data-pjax' => 0,
				  'class'=>"btn btn-default btn-xs",    
				  'style'=>['text-align'=>'left','width'=>'100%', 'height'=>'25px','border'=> 'none','color'=>'black'],
				];
		$icon = '
					<span class="fa-stack fa-xs">																	
						<i class="fa fa-circle-thin fa-stack-2x " style="color:'.bgIconColor().'"></i>
						<i class="fa fa-money fa-stack-1x" style="color:black"></i>
					</span>
				';   
		$label = $icon . ' ' . $title;
		$content = Html::a($label,$url,$options);
		return  $content ;
	}
		
	/*
	 * Button - DENY.
	 * Limited Access.
	 * update : 24/02/2017.
	 * PR	  : useroption invalid foreach.
	*/	
	function tombolDeny($url, $model){
		//if(Yii::$app->getUserOpt->Modul_aksesDeny('11')==0){
			$title1 = Yii::t('app',' Limited Access');
			$url = url::to(['/efenbi-rasasayang/store']);
			$options1 = [
				'value'=>$url,
				'id'=>'store-button-deny',
				'class'=>"btn btn-default btn-xs",      
				'style'=>['text-align'=>'left','width'=>'100%', 'height'=>'25px','border'=> 'none'],
			];
			$icon1 = '
				<span class="fa-stack fa-xs">																	
					<i class="fa fa-circle fa-stack-2x " style="color:#B81111"></i>
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
	 * Modal store
	 * Author	: ptr.nov2gmail.com
	 * Update	: 21/01/2017
	 * Version	: 2.1
	 * ==============================
	*/
	$modalHeaderColor='#fbfbfb';//' rgba(74, 206, 231, 1)';
	
	/*
	 * store - VIEW.
	*/
	Modal::begin([
		'id' => 'store-modal-view',
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:'.bgIconColor().'"></i>
				<i class="fa fa-eye fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> VIEW STORE</b>
		',	
		'size' => 'modal-dm',
		//'options' => ['class'=>'slide'],
		'headerOptions'=>[
			'style'=> 'border-radius:5px; background-color:'.$modalHeaderColor,
			//'toggleButton' => ['label' => 'click me'],
		],
		//'clientOptions' => ['backdrop' => 'static', 'keyboard' => TRUE]
		'clientOptions' => [
			'backdrop' => FALSE, //Static=disable, false=enable
			'keyboard' => TRUE,	// Kyboard 
		]
	]);
	echo "<div id='store-modal-content-view'></div>";
	Modal::end();
	
	/*
	 * store - REVIEW.
	*/
	Modal::begin([
		'id' => 'store-modal-review',
		
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:'.bgIconColor().'"></i>
				<i class="fa fa-edit fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> REVIEW STORE</b>
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
	echo "<div id='store-modal-content-review'></div>";
	Modal::end();
	
?>