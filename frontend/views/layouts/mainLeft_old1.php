<?php
use yii\helpers\Html;
use common\models\User;
use common\models\UserloginSearch;
use common\models\ModulMenuSearch;
use common\models\ModulMenu;

$menuBegin='<ul class="sidebar-menu" >';
$menuEnd='</ul>';
$menuTour='
	<!-- Tour !-->
	<li class="treeview">
		<a href="/site">
			<i class="fa fa-home"></i> <span>Tour</span>
		</a>
	</li>
';
$menuDashboard='
	<li class="treeview">
		<a href="/dashboard">
			<i class="fa fa-dashboard"></i> <span>Dashboard</span>
		</a>
	</li>		
';
$menuMasterData='
	<!-- MASTER DATA !-->
	<li class="treeview">
		<a href="#">
			 <i class="fa fa-bar-chart-o"></i>
			 <span>Main Data</span>
			 <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			 <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> Data Outlet</a></li>
			 <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> Data Barang</a>
			 </li>
			  <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> Data Harga</a>
			 </li>
		</ul>
	</li>
';
$menuInventory='
	<!-- INVENTORY !-->
	<li class="treeview">
		<a href="#">
			 <i class="fa fa-bar-chart-o"></i>
			 <span>Inventory</span>
			 <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			 <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> Stock Barang</a>
			</li>
			 <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> Stock Closing</a>
			</li>
			 <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> Stock Opname</a>
			</li>
		</ul>
	</li>
';
$menuSales='
	<!-- SALES !-->
	<li class="treeview">
		<a href="#">
			 <i class="fa fa-bar-chart-o"></i>
			 <span>Sales</span>
			 <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			 <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> Data Outlet</a>
			</li>
			 <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> Data Barang</a>
			</li>
			 <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> Data Discount</a>
			</li>
		</ul>
	</li>
';
$menuAccounting='
	<!-- ACCOUNTING !-->
	<li class="treeview">
		<a href="#">
			 <i class="fa fa-bar-chart-o"></i>
			 <span>Accounting</span>
			 <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			<li>
				<a href="#"><i class="fa fa-angle-double-right"></i> Jurnal</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-angle-double-right"></i> Arus Keuangan</a>
			</li>
			
		</ul>
	</li>
';
$menuHrd='
	<!-- HIRS !-->
	<li class="treeview">
		<a href="#">
			 <i class="fa fa-bar-chart-o"></i>
			 <span>HRD</span>
			 <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			 <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> Data Karyawan</a>
			</li>
			 <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> Data Absensi</a>
			</li>
			 <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> HRD Reporting</a>
			</li>
		</ul>
	</li>
';
$menuSetingt='
	<!-- HIRS !-->
	<li class="treeview">
		<a href="#">
			 <i class="fa fa-bar-chart-o"></i>
			 <span>Setting</span>
			 <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			 <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> Profile</a>
			</li>
			 <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> User Permission</a>
			</li>
			 <li>
				<a href="#"><i class="fa fa-angle-double-right"></i> log App</a>
			</li>
		</ul>
	</li>
';
//Left Menu Result.
$menu1=
$menuBegin
//.$menuHome
.$menuDashboard
.$menuMasterData
.$menuInventory	
.$menuAccounting
.$menuSales
.$menuHrd
.$menuSetingt;


//$userImage=User::find()->asArray()->where(['id' =>Yii::$app->user->id])->one();
$userData=User::find()->where(['id' =>Yii::$app->user->id])->one();
//$userImage=$userData['Noimage']!=''?Html::img('data:image/jpg;charset=utf-8;base64,'.$userData['Noimage']):Html::img('data:image/jpg;charset=utf-8;base64,'.$userData['Noimage']);

//print_r($userData['Noimage']);

$searchModel = new ModulMenuSearch(['UserUnix'=>'20170404081602','MODUL_GRP'=>0]);
$dataProvider = $searchModel->searchUserMenu(Yii::$app->request->queryParams);
$modelMenu=$dataProvider->getModels();
$groupingMenu= Yii::$app->arrayBantuan->array_group_by($modelMenu,'MODUL_GRP');
$getMenu='';
foreach($groupingMenu as $row0 => $val0){
	//$menu[]=$row0; //get ID Group
	$menuHeader='';
	$tmpSub='';			
	foreach($groupingMenu[$row0] as $row1 => $val1){
		$menuSub1='';
		//Array Bantuan - | 1= not treeview-menu; >1 = have  treeview-menu;
		$cntHdr=count(Yii::$app->arrayBantuan->array_find($modelMenu,'MODUL_GRP',$row0));
		if($val1['MODUL_ID']==$val1['MODUL_GRP']){
			if($cntHdr==1){
				$menuHeader='
					<a href="#">
						 <i class="fa fa-bar-chart-o"></i>
						 <span>'.$val1['BTN_NM'].'</span>
					</a>				
				';
			}else{
				$menuHeader='
					<a href="#">
						 <i class="fa fa-bar-chart-o"></i>
						 <span>'.$val1['BTN_NM'].'</span>
						 <i class="fa fa-angle-left pull-right"></i>
					</a>				
				';
			}			
		}else{
			//$tmpSub.='<li>'.$val1['BTN_NM'].'</li>';				
			$tmpSub.='
				<li><a href="#"><i class="fa fa-angle-double-right"></i>'.$val1['BTN_NM'].'</a></li>
			';				
		};		
	}
	
	$menuSub1='<ul class="treeview-menu">'.$tmpSub.'</ul>';
	$getMenu=$getMenu.'<li class="treeview">'.$menuHeader.$menuSub1.'</li>';
};

$menu=$menuBegin.$getMenu.$menuEnd;
?>


	<section class="sidebar ">
		<!-- User Login -->
			<div class="user-panel">
				<div class="pull-left" style="text-align: left">
					<img src="<?='data:image/jpg;charset=utf-8;base64,'.$userData['Noimage']?>" class="img-circle" alt="Cinque Terre" width="80" height="80"/>
				</div>
				<div class="pull-left info" style="margin-left: 40px" >
					<p><?=Yii::$app->getUserOpt->user()['username']?></p>
				
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
		<div class="user-panel" style="margin-top:20px;background-color:rgba(19, 105, 144, 1)">
			<!-- /.Company Select Dashboard -->
			 <p style="color:white">
				<?php
					// if ($this->sideCorp != '') {
						// echo $this->sideCorp;
					// }else{
						 echo 'PT. Lukison Group';
					// };
				?>
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
			<?=$menu?>
			</div>
	</section>
