<?php
// use frontend\assets\AppAsset;
// AppAsset::register($this);
// dmstr\web\AdminLteAsset::register($this);
?>

<div class="content-wrapper">
	<!--<div class="panel panel-default" style="margin-bottom: 0">!-->
		<?php
		   /*
		   echo Breadcrumbs::widget([
						   'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
						   'options'=>[
							   'class' => 'breadcrumb',
							   'style'=>'background-color:#e1e1e1;margin-bottom:0;margin-top:0',
						   ],
					   ]);
			*/
		?>
	<!--</div>!-->
	<div class="panel panel-default" style="margin-left: 2px; margin-right: 2px ;margin-bottom: 0">
		<?php
			// Title Penganti Breadcrumbs Author: -ptr.nov-
		   /*  echo Html::panel(
				['heading' => $this->title ],
				Html::TYPE_DANGER
			);
			*/
		 ?>
		  <div style="margin-top: 20px; min-height:610px">
			<?= $content ?>
		  </div>
		
   </div>
</div>