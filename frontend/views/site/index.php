<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use frontend\assets\AppAsset;
AppAsset::register($this);
	$bgColor='#4d4368';//'#3e3939';//black   //'#2292d0'//blue;
	$bgColorIcon='#fffefe';//'#c72b42';//merah
	$rangeColorIcon='#4d4368';//blue;'#25ca4f';// hijo
	$colorIcon='#3e3939';
	$colorTextIcon='#0f0202';
?>


<div class="container-fluid" style="padding-left: 20px; padding-right: 20px" >
<?php echo "index";?>
</div>
<?php

	Modal::begin([
			'id' => 'confirm-permission-alert',
			'header' => '<div style="float:left;margin-right:10px">'. Html::img('@web/img_setting/warning/denied.png',  ['class' => 'pnjg', 'style'=>'width:40px;height:40px;']).'</div><div style="margin-top:10px;"><h4><b>Access Denied !</b></h4></div>',
			'size' => Modal::SIZE_SMALL,
			'headerOptions'=>[
				'style'=> ' ; background-color:rgba(142, 202, 223, 0.9)'
			]
		]);
		echo "<div>You do not have permission for this module.
				<dl>
					<dt>Contact : itdept@lukison.com</dt>
				</dl>
			</div>";
	Modal::end();
?>

