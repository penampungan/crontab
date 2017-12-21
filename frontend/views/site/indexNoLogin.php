<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use frontend\assets\AppAsset;
AppAsset::register($this);
use frontend\assets\AppAssetSmoth;
AppAssetSmoth::register($this);

	$bgColor='#4d4368';//'#3e3939';//black   //'#2292d0'//blue;
	$bgColorIcon='#fffefe';//'#c72b42';//merah
	$rangeColorIcon='#4d4368';//blue;'#25ca4f';// hijo
	$colorIcon='#3e3939';
	$colorTextIcon='#0f0202';
?>
 <!-- Header -->
   <section class="success " id="home">
		<div class="text-center">
			<h1 class="name ">Why Use KG</h1>
			<hr class="star-light">
			<span class="skills" style="width30px">Kontrol Gampang - Aplikasi Kasir </span>
		</div>
		<div class="row">				
			<div class="col-lg-12">
				<?=$this->render('_home')?>						
			</div>
		</div>			
   </section>

    <!-- service Grid Section -->
    <section id="service">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>service</h2>
				<hr class="star-primary">
			</div>
		</div>
       <?=$this->render('_service')?>
    </section>

    <!-- help Section -->
    <section class="success" id="help">
        <?=$this->render('_help')?>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <?=$this->render('_contact')?>
    </section>
	<section class="success col-xs-12 col-sm-12 col-lg-12" id="login-select">		
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>SIGNUP</h2>
				<hr class="star-light">
			</div>
		</div>		
		<div class="col-xs-12 col-sm-6 col-lg-6">	
			<div class="row">
				<!-- LOGIN Section -->				
					<?php
						if (Yii::$app->user->isGuest){
							echo $this->render('login',[
								'model'=>$model
							]);
						}
					?>				
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-lg-6">	
			<div class="row">
				<!-- SIGNUP Section -->					
					<?php
						if (Yii::$app->user->isGuest){
							echo $this->render('signup');
						}else{
							Yii::$app->getSession()->setFlash('success','Check Your email!');
							echo $this->render('signup_confirm');
						}
					?>	
				
			</div>
		</div>	
	</section>
	

