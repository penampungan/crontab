<?php
/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2015 - 2017
 * @package   yii2-tree-manager
 * @version   1.0.6
 */

use kartik\form\ActiveForm;
use kartik\tree\Module;
use kartik\tree\TreeView;
use kartik\tree\models\Tree;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;

/**
 * @var View       $this
 * @var Tree       $node
 * @var ActiveForm $form
 * @var string     $keyAttribute
 * @var string     $nameAttribute
 * @var string     $iconAttribute
 * @var string     $iconTypeAttribute
 * @var string     $iconsList
 * @var string     $action
 * @var array      $breadcrumbs
 * @var array      $nodeAddlViews
 * @var mixed      $currUrl
 * @var boolean    $showIDAttribute
 * @var boolean    $showFormButtons
 * @var boolean    $allowNewRoots
 * @var string     $nodeSelected
 * @var array      $params
 * @var string     $keyField
 * @var string     $nodeView
 * @var boolean    $softDelete
 */
?>

<?php
/**
 * SECTION 1: Initialize node view params & setup helper methods.
 */
?>
<?php
/**  */
extract($params);
//print_r($node);
echo '</br>';
print_r($node['id']);
$module = TreeView::module(); // the treemanager module
$formOptions['id'] = 'kv-' . uniqid();
$form = ActiveForm::begin();
$keyField = $node['id'];

?>

<?php
/**
 * Hash signatures to prevent data tampering
 * @var string $modelClass
 */
$security = Yii::$app->security;
unset($formOptions['id']);
$breadcrumbs['depth'] = '';
$dataToHash = $modelClass . !!$softDelete. !!$showFormButtons . !!$showIDAttribute .
    $currUrl . $nodeView . $nodeSelected . Json::encode($formOptions) .
    Json::encode($nodeAddlViews) . Json::encode(array_values($iconsList)) . Json::encode($breadcrumbs)	;
echo Html::hiddenInput('treeManageHash', $security->hashData($dataToHash, $module->treeEncryptSalt));

?>

<?php ActiveForm::end() ?>

       
    <div class="row">
        <div class="col-sm-6">
            <?= $keyField ?>
            <?php 
				echo $this->render('_form_1');
			?>
        </div>
        
    </div>





