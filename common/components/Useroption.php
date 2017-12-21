<?php
/**
 * Created by PhpStorm.
 * User: ptr.nov
 * Date: 10/08/15
 * Time: 19:44
 */
namespace common\components;
use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\base\Component;
use Yii\base\Model;
use yii\data\ArrayDataProvider;

use common\models\UserloginSearch;
use common\models\Userlogin;
use common\models\ModulMenuSearch;
use common\models\StoreSearch;
/** 
  * Components User Option
  * @author ptrnov  <ptr.nov@gmail.com>
  * @since 1.1
*/
class Useroption extends Component{	
	
	/**
	 * USER LOGIN INDENTIFY CENTER.
	 * STATUS	: PER-USER [Login User Propertis].
	 * ACCESS	: 
	 *			1. isGuest/!isGuest.
	 *			2. 'sessionTimeoutSeconds' =>'1800',									// '1800=30menit',.
	 * PARAM	: Yii::$app->getUserOpt->user()['user field'] 							//usage (isGuest/!isGuest).
	 * Example1 		: Yii::$app->getUserOpt->user();
	 * Example2 Field	: Yii::$app->getUserOpt->user()['ACCESS_UNIX'];
	 * Example3 Join 	: Yii::$app->getUserOpt->user()['profile']['field properties'];
	 * Author	: Piter Novian [ptr.nov@gmail.com].	Example usage
	*/	 
	public function User(){
		if (!Yii::$app->user->isGuest){
			$ModelUser = Userlogin::find()->where(['id'=>Yii::$app->user->identity->id])->one()->toArray(); //Model get function field
			if (count($ModelUser)<>0){ //RECORD TIDAK ADA 
			//$userid=$ModelProfile->user->id;			
			//$deptid=$ModelProfile->emp->DEP_ID;			
				return $ModelUser;
			} else{
				return 0;
			}
		}		 
	}
	
	/*
	 * TREE MENU - PERMISSION MODUL MENU.
	 * STATUS	: PER-USER [Login Menu TTree Aksess].
	 * ACCESS	: Base on function UserMenu(Show/hidden).
	 *			1. Show/hidden Menu
	 *			2. URL access Permission.
	 * PARAM	: Yii::$app->getUserOpt->UserMenu() //set menuLeft.
	 * Author	: Piter Novian [ptr.nov@gmail.com].
	*/
	public function UserMenu(){
		if (!Yii::$app->user->isGuest){
			//$modelUser = Userlogin::find()->where(['id'=>Yii::$app->getUserOpt->user()['id']])->asArray()->one();
			//Get Model data Menu, $param 'UserUnix'=>'20170404081602',
			//$searchModel = new ModulMenuSearch(['UserUnix'=>$modelUser['ACCESS_UNIX']]);
			$searchModel = new ModulMenuSearch(['UserUnix'=>Yii::$app->getUserOpt->user()['ACCESS_UNIX']]);
			//$searchModel = new ModulMenuSearch(['UserUnix'=>'20170404081602']);
			$dataProvider = $searchModel->searchUserMenu(Yii::$app->request->queryParams);
			$modelMenu=$dataProvider->getModels();
			//Grouping Menu by field, MODUL_GRP
			$groupingMenu= Yii::$app->arrayBantuan->array_group_by($modelMenu,'MODUL_GRP');
			//print_r($modelMenu);
			$getMenu='';
			$menuBegin='<ul class="sidebar-menu" >';
			$menuEnd='</ul>';
			foreach($groupingMenu as $row0 => $val0){
				//$menu[]=$row0; //get ID Group			
				$menuHeader='';
				$tmpSub='';			
				foreach($groupingMenu[$row0] as $row1 => $val1){
					$menuSub1='';
					//Array Bantuan - | 1= not treeview-menu; >1 = have  treeview-menu;
					$cntHdr=count(Yii::$app->arrayBantuan->array_find($modelMenu,'MODUL_GRP',(int)$row0));
					//print_r($cntHdr);
					if($val1['MODUL_STS'] && $val1['modulMenuTbl']['STATUS']==1 ){
						if((int)$val1['MODUL_ID']==(int)$val1['MODUL_GRP']){
							$iconHead=$val1['BTN_ICON']!=''?'fa-'.$val1['BTN_ICON']:'fa-circle-o';
							if((int)$cntHdr==1){
								$menuHeader='
									<a href="'.$val1['BTN_URL'].'">
										 <i class="fa '.$iconHead.'"></i>
										 <span>'.$val1['BTN_NM'].'</span>
									</a>				
								';
							}else{
								$menuHeader='
									<a href="'.$val1['BTN_URL'].'">
										 <i class="fa '.$iconHead.'"></i>
										 <span>'.$val1['BTN_NM'].'</span>
										 <i class="fa fa-angle-left pull-right"></i>
									</a>				
								';
							}			
						}else{
							$iconSub1=$val1['BTN_ICON']!=''?'fa-'.$val1['BTN_ICON']:'fa-angle-double-right';
							//$tmpSub.='<li>'.$val1['BTN_NM'].'</li>';				
							$tmpSub.='
								<li><a href="'.$val1['BTN_URL'].'"><i class="fa '.$iconSub1.'"></i>'.$val1['BTN_NM'].'</a></li>
							';				
						};	
					}
				}			
				$menuSub1=$tmpSub!=''?'<ul class="treeview-menu">'.$tmpSub.'</ul>':'';
				$getMenu=$getMenu.'<li class="treeview">'.$menuHeader.$menuSub1.'</li>';			
			};
			$menu=$menuBegin.$getMenu.$menuEnd;
			return $menu;
		}
	}
	
	/*
	 * PERMISSION MODUL MENU.
	 * STATUS	: PER-USER [Login Menu Aksess].
	 * ACCESS	: Base on function UserMenu(Show/hidden).
	 *			1. Show/hidden Menu
	 *			2. URL access Permission.
	 * PARAM	: Yii::$app->getUserOpt->UserMenuPermission(3)['BTN_SIGN1'] 
	 * 			  set controllers beforeAction($action)
	 * 			  UserMenuPermission(FIELD MANU_ID)['FIELD modul_permission'].
	 * Author	: Piter Novian [ptr.nov@gmail.com].
	*/
	public function UserMenuPermission($valueMenu){
		if (!Yii::$app->user->isGuest){
			$searchModel = new ModulMenuSearch(['UserUnix'=>Yii::$app->getUserOpt->user()['ACCESS_UNIX']]);
			$dataProvider = $searchModel->searchUserMenu(Yii::$app->request->queryParams);
			$modelMenu=$dataProvider->getModels();
			$data=Yii::$app->arrayBantuan->array_find($modelMenu, 'ID',$valueMenu)[0];
			if(	$data['modulMenuTbl']['STATUS'] OR
				$data['modulMenuTbl']['BTN_VIEW'] OR
				$data['modulMenuTbl']['BTN_REVIEW']==1 OR
				$data['modulMenuTbl']['BTN_CREATE']==1 OR
				$data['modulMenuTbl']['BTN_EDIT']==1 OR
				$data['modulMenuTbl']['BTN_DELETE']==1 OR
				$data['modulMenuTbl']['BTN_SIGN1']==1 OR
				$data['modulMenuTbl']['BTN_SIGN2']==1 OR
				$data['modulMenuTbl']['BTN_SIGN3']==1 OR
				$data['modulMenuTbl']['BTN_SIGN3']==1 OR
				$data['modulMenuTbl']['BTN_SIGN4']==1 
			){
				$pageViewUrl=true;
			}else{
				$pageViewUrl=false;
			};
			$pageUrlView=
			$dataRslt=[
				'modulMenu'=>$data,
				'ModulPermission'=>$data['modulMenuTbl'],
				'PageViewUrl'=>$pageViewUrl
			];
			
			//return $modelMenu;
			//Yii::$app->arrayBantuan->array_find($modelMenu, 'ID',3)
			//if(isset(Yii::$app->arrayBantuan->array_find($modelMenu, 'ID',$valueMenu)[0]['modulMenuTbl'])){
				//return Yii::$app->arrayBantuan->array_find($modelMenu, 'ID',$valueMenu)[0]['modulMenuTbl'];
				return $dataRslt;
			// }else{
				// return ['STATUS'=>0];	//isset ofset - Because lost row join. 
			// }
			
		}
	}
	/*
	 * SET ON CONTROLLER BEFORE ACTION
		 public function beforeAction($action){
			 $modulIndentify=19; //User Permission
			// Check only when the user is logged in.
			// Author piter Novian [ptr.nov@gmail.com].
			if (!Yii::$app->user->isGuest){
				if (Yii::$app->session['userSessionTimeout']< time() ) {
					// timeout
					Yii::$app->user->logout();
					return $this->goHome(); 
				} else {	
					//add Session.
					Yii::$app->session->set('userSessionTimeout', time() + Yii::$app->params['sessionTimeoutSeconds']);
					//check validation [access/url].
					$checkAccess=Yii::$app->getUserOpt->UserMenuPermission($modulIndentify);
					if($checkAccess['modulMenu']['MODUL_STS']==0 OR $checkAccess['ModulPermission']['STATUS']==0){				
						$this->redirect(array('/site/alert'));
					}else{
						if($checkAccess['PageViewUrl']==true){						
							return true;
						}else{
							$this->redirect(array('/site/alert'));
						}					
					}			 
				}
			}else{
				Yii::$app->user->logout();
				return $this->goHome(); 
			}
		}
	*/
	
	
	/*
	 * PERMISSION OUTLET.
	 * STATUS	: PER-USER [Login Aksess].
	 * ACCESS	: STORE SIGN BY Array[ACCESS_UNIX].
	 *			1. User['ACCESS_LEVEL']= "admin" -> Maka User['ACCESS_SITE']="1" -> Template Admin Control.
	 *			2. User['ACCESS_LEVEL']= "owner" -> Maka User['ACCESS_SITE']="2" -> Template User Backend (web/mobile).
	 *			3. User['ACCESS_LEVEL']= "kasir" -> Maka User['ACCESS_SITE']="3" -> Template Mobile Control.	 
	 * PARAM	: Yii::$app->getUserOpt->UserStore();
	 * Author	: Piter Novian [ptr.nov@gmail.com].
	*/
	public function UserStore(){
		if (!Yii::$app->user->isGuest){
			$searchModel = new StoreSearch(['ACCESS_UNIX'=>Yii::$app->getUserOpt->user()['ACCESS_UNIX']]);
			$dataProvider1 = $searchModel->searchUserStore(Yii::$app->request->queryParams);
			$modelMenu=$dataProvider1->getModels();
			return $modelMenu;			
		}		
	}
	
	
	/*
	 * USER PAYMENT PAKAGE(Disble/enable User) .
	 * STATUS	: 
	 *			1. PER-USER [Login Aksess TRIAL]. //30Days.
	 *				1. User Ouwer (enable).  user STATUS <> 10.
	 *				2. Outlet (disable/enable).
	 *			2. PER-USER [Login Aksess OWNER]. //
	 * 				1. one week Remainder invoice.
	 *				2. one week + 1 (Disable status user Account). STATUS <> 10.
	 * ACCESS	: 
	 *			1. User Ouwer (enable).  user STATUS <> 10.
	 *			2. User kasir/acct (disable/enable).
	 *			3. Outlet (disable/enable).
	 * PARAM	: Yii::$app->getUserOpt->UserPayment();
	 * NOTED	: show status/progress on dashboard.
	 * Author	: Piter Novian [ptr.nov@gmail.com].
	*/
	public function UserPayment(){	
		/* ------------------------------------------------
		 * == Announcment [lose pakage payment].==
		 * 1. USER (KASIR)->STATUS(disable/enable).
		 * 2. Outlet (disable/enable).
		 * ------------------------------------------------
		 * == Announcment [lose pakage payment]===
		 * 1. Tidak menjamin ke-valitan data tanggal ofline.
		 * 2. Tidak menjamin Calculate ke-valitan data.
		 * 3. Tidak menjamin sycronize mobile to cloud berhasil semua.
		*/
	
	
	}

	

	
}