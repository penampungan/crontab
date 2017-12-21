<?php
use kartik\form\ActiveForm;
use kartik\tree\Module;
use kartik\tree\TreeView;
use kartik\tree\models\Tree;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;
use kartik\grid\GridView;
use yii\helpers\Url;
use common\models\ModulPermissionSearch;

/**
 * MODIFY TREE VIEWS.
 * Param - tree-manager
*/
extract($params);
$keyField = $node['ACCESS_UNIX'];
$username = $node['username'];
      
/**
 * Widget		: yii2-tree-manager
 * Controllers 	: NodeController 
 * path			: D:\xampp\htdocs\KontrolGampang\vendor\kartik-v\yii2-tree-manager
 * Change		: ActionManage()
 *				  //static::checkSignature('manage', $data);
 */
?>
<div class="row">
	<?php 
		//get Data Search
		//echo $ACCESS_UNIX;
		//echo $username;
		$searchModelpermision = new ModulPermissionSearch([
			//'USER_UNIX'=>'20170404081601',//$keyField
			'USER_UNIX'=>$keyField
		]);
		$dataProviderpermision = $searchModelpermision->search(Yii::$app->request->queryParams);
		//Render
		echo $this->render('_formPermission',[
			'keyField'=>$keyField,
			'searchModelpermision'=>$searchModelpermision,
			'dataProviderpermision'=>$dataProviderpermision
		]);
	?>
</div>

<?php

/**
 * ===============
 * Main - Config.
 * ===============
	'treemanager' =>  [
		'class' => '\kartik\tree\Module',
		'treeStructure'=>[
			'treeAttribute' => 'root',
			'leftAttribute' => 'lft',
			'rightAttribute' => 'rgt',
			'depthAttribute' => 'lvl',
		],
		'dataStructure'=>[
			'keyAttribute'=>'id',
			'nameAttribute'=>'username',
			'iconAttribute'=>'icon',
			'iconTypeAttribute'=>'icon_type',
		],
		'treeViewSettings'=> [
			'nodeView' => '@frontend/backend/sistem/views/permission/_form'
			
		]
	],
 */
?>



