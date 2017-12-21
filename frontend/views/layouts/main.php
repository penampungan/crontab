<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use frontend\assets\AppAsset;
AppAsset::register($this);

	
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>">
		<head>
			<meta charset="<?= Yii::$app->charset ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<?= Html::csrfMetaTags() ?>
			<title><?= Html::encode($this->title) ?></title>
			<?php $this->head() ?>
		</head>
		<!-- 
			Default collapse ~ptr.nov~ 
			skin-blue sidebar-mini sidebar-collapse
		!-->
		<!--<body class="skin-blue sidebar-collapse" style="min-height:680px"> 	!-->	
		<body class="skin-blue " style="min-height:680px"> 		
			<! - NOT LOGIN- Author : -ptr.nov- >
			<?php if (Yii::$app->user->isGuest) { ?>
				<?php $this->beginBody(['id'=>'page-top','class'=>'index']) ?>
					<div class="wrap">
						<!-- NAV BAR !-->
						<?=$this->render('main-navbarNologin')?>
						<!-- BODY CONTAINER !-->
						<div>
							<?= $content ?>
						</div>
					</div>
					<!-- FOOTER !-->
					<?=$this->render('main-footer')?>
				<?php $this->endBody() ?>
			<?php }; ?>
			<! -LOGIN- Author : -ptr.nov- >
			<?php if (!Yii::$app->user->isGuest) { ?>
				<?php $this->beginBody(['id'=>'page-top','class'=>'index']) ?>
					<div class="wrap">
						<!-- TOP NAV BAR !-->
						<?=$this->render('main-navbar')?>
						<!-- LEFT MENU !-->
						<aside class="main-sidebar " style="min-height:680px">						
						<?=$this->render('mainLeft'); ?>
						</aside>
						<!-- BODY CONTAINER !-->	
						<?=$this->render('mainContent',['content'=>$content]); ?>	
						<!-- FOOTER !-->
						<?php //=$this->render('main-footer')?>						
					</div>
					
				<?php $this->endBody() ?>
			<?php }; ?>
		</body>
	</html>
<?php $this->endPage() ?>
