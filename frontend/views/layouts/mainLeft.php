<?php
use yii\helpers\Html;
use common\models\User;
use common\models\UserloginSearch;
use frontend\assets\AppAsset;
AppAsset::register($this);

?>


	<section class="sidebar ">
		<!-- User Login -->
			<div class="user-panel">
				<div class="pull-left" style="text-align: left">
					<img src="<?='data:image/jpg;charset=utf-8;base64,'.Yii::$app->getUserOpt->user()['IMG64']?>" class="img-circle" alt="Cinque Terre" width="80" height="80"/>
				</div>
				<div class="pull-left info" style="margin-left: 40px" >
					<p><?=Yii::$app->getUserOpt->user()['PROFILE_NM']?></p>
				
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
		<div class="user-panel" style="margin-top:20px;background-color:rgba(19, 105, 144, 1)">
			<!-- /.Company Select Dashboard -->
			 <p style="color:white">
				<?=Yii::$app->getUserOpt->user()['CORP_NM']?>
			 </p>
		</div>
		   
		<!-- /.User Login -->
		<!-- search form -->
			<!-- 
			<form action="#" method="get" class="sidebar-form skin-blue">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search..."/>
				  <span class="input-group-btn">
					<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
					</button>
				  </span>
				</div>
			</form>
			 -->
		<!-- /.search form -->
			<?php
				/**
				 * Author: -ptr.nov-
				 * Noted: add variable "sideMenu" get value
				 * \vendor\yiisoft\yii2\web\View.php
				*/
			/* $side_menu='';
				//echo $this->sideMenu;
				if ($this->sideMenu != false) {
					$getSideMenu=$this->sideMenu;
					if (M1000::find()->findMenu($this->sideMenu)->one()){
						$getSideMenu=$this->sideMenu;

					}else{
						echo Html::panel(
							['heading' => 'variabel $this->sideMenu = "'.  $getSideMenu . '"; Tidak ditemukan dalam database dbm000, tabel m1000, tambahkan pada view anda menu yang benar untuk menu samping '],
							Html::TYPE_INFO
						);
						 $getSideMenu='mdefault';
					}
				}else{
					$getSideMenu='mdefault';
				};

				$side_menu=\yii\helpers\Json::decode(M1000::find()->findMenu($getSideMenu)->one()->jval);
				if (!Yii::$app->user->isGuest) {
					echo SideNav::widget([
						'items' => $side_menu,
						'encodeLabels' => false,
						//'heading' => $heading,
						'type' => SideNav::TYPE_DEFAULT,
						'options' => [
							'class' => 'navbar-default bg-black',
							//'style'=>'background-color:#313131',
						],
					]);
				}; */
			?>
			<div id="side">
			<?=Yii::$app->getUserOpt->UserMenu()?>
			</div>
	</section>
