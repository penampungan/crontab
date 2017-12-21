<?php 
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use ptrnov\fusionchart\Chart;
use ptrnov\fusionchart\ChartAsset;
ChartAsset::register($this);

//print_r(Yii::$app->getUserOpt->user());
	$_indexChart1=$this->render('_indexChart1',[
		'totalGrandHari'=>'100',//$totalGrandHari,
		'totalTransHari'=>'1000.000',//$totalTransHari,
		'totalMember'=>'100',//$totalMember
	]);

	/* $items=[
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Sales Rasa-Sayang','content'=>
			$_indexChart1,
			// $_indexSalesWeekHour.
			// $_indexSalesWeek.						
			// $_indexSalesYear.
			// $_indexTop5MemberTenanMonth,
			'active'=>true,			
		],		
		
	]; */	


	// $tabDashboard= TabsX::widget([
			// 'items'=>$items,
			// 'position'=>TabsX::POS_ABOVE,
			// 'height'=>TabsX::SIZE_TINY,
			// 'bordered'=>true,
			// 'encodeLabels'=>false,
			// 'height'=>'450px',
			// 'align'=>TabsX::ALIGN_LEFT,						
		// ]);											
?>
<div id="loaderPtr"></div>
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt;">
		
			<?=$_indexChart1?>			
		
</div>