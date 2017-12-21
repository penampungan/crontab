<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

use frontend\assets\AppAssetSmoth;
AppAssetSmoth::register($this);


    NavBar::begin([
        // 'brandLabel' => '		
			// <img src="http://ptrnov.net/img/ptrnov-putih.png" class="navbar-header page-scroll" style="width:170px; height:40px; margin-left:50px; margin-top:0px"/>
		// ',
        'brandLabel' =>'
			 <div class="navbar-header page-scroll">                
                <a class="navbar-brand" href="#page-top">Kontrol Gampang</a>
            </div>
		',
		'brandUrl' => Yii::$app->homeUrl,
        'options' => [
			'id'=>'mainNav',
            //'class' => 'navbar-inverse navbar-fixed-top',
            'class' => 'navbar navbar-default navbar-fixed-top navbar-custom',
        ],
    ]);
	
	if (Yii::$app->user->isGuest) {
		$menuItems[] = '<li class="hidden"> <a href="#page-top"></a></li>';
		$menuItems[] = '<li class="page-scroll"> <a href="#home" id="home-controller">Home</a></li>';
		$menuItems[] = '<li class="page-scroll"> <a href="#service" id="service-controller">Service</a></li>';
		$menuItems[] = '<li class="page-scroll"> <a href="#help" id="help-controller">Help</a></li>';
		$menuItems[] = '<li class="page-scroll"> <a href="#contact" id="contact-controller">Contact</a></li>'; 
       //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        //$menuItems[] = '<li class="page-scroll">  <a href="#signup-select" id="signup-controller">Signup</a></li>';
		$menuItems[] = '<li class="page-scroll">  <a href="#login-select" id="login-controller">Login</a></li>';
	
       // $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
	?>
     <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">!-->
	 <?php
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => $menuItems,
		]);
	
	?>
	<!--</div>!-->
	<?php
    NavBar::end();
    ?>
	
	<?php
	$this->registerJs("
		//$('body').scrollspy({ target: '.navbar-fixed-top' })
	",$this::POS_READY);
	?>