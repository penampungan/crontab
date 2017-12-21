<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2015 - 2017
 * @package   yii2-tree-manager
 * @version   1.0.6
 */

namespace frontend\backend\sistem\controllers;

use Yii;
use Closure;
use Exception;
use yii\db\Exception as DbException;
use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;
use yii\base\NotSupportedException;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;
use yii\base\InvalidCallException;
use yii\web\View;
use yii\base\Event;
use kartik\tree\TreeView;
use kartik\tree\models\Tree;

class NodeController extends Controller
{
    /**
     * Gets the data from $_POST after parsing boolean values
     *
     * @return array
     */
    protected static function getPostData()
    {
        if (empty($_POST)) {
            return [];
        }
        $out = [];
        foreach ($_POST as $key => $value) {
            $out[$key] = in_array($key, static::$boolKeys) ? filter_var($value, FILTER_VALIDATE_BOOLEAN) : $value;
        }
        return $out;
    }


    /**
     * View, create, or update a tree node via ajax
     *
     * @return string json encoded response
     */
    public function actionManage()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        //static::checkValidRequest();
        $callback = function () {
            //$parentKey = null;
            $modelClass = '\kartik\tree\models\Tree';
            //$isAdmin = $softDelete = $showFormButtons = $showIDAttribute = $allowNewRoots = false;
            //$currUrl = $nodeView = $formAction = $nodeSelected = '';
            //$formOptions = $iconsList = $nodeAddlViews = $breadcrumbs = [];
            $data = static::getPostData();
            extract($data);
            /**
             * @var Tree $modelClass
             * @var Tree $node
             */
            if (!isset($id) || empty($id)) {
                $node = new $modelClass;
                $node->initDefaults();
            } else {
                $node = $modelClass::findOne($id);
            }
            $module = TreeView::module();
            $params = $module->treeStructure + $module->dataStructure + [
                    'node' => $node,
                    //'parentKey' => $parentKey,
                    //'action' => $formAction,
                    //'formOptions' => empty($formOptions) ? [] : $formOptions,
                    //'modelClass' => $modelClass,
                    //'currUrl' => $currUrl,
                    //'isAdmin' => $isAdmin,
                    // 'iconsList' => $iconsList,
                    // 'softDelete' => $softDelete,
                    // 'showFormButtons' => $showFormButtons,
                    // 'showIDAttribute' => $showIDAttribute,
                    // 'allowNewRoots' => $allowNewRoots,
                    'nodeView' => $nodeView,
                    // 'nodeAddlViews' => $nodeAddlViews,
                    // 'nodeSelected' => $nodeSelected,
                   // 'breadcrumbs' => empty($breadcrumbs) ? [] : $breadcrumbs,
                ];
            /* if (!empty($module->unsetAjaxBundles)) {
                Event::on(View::className(), View::EVENT_AFTER_RENDER, function ($e) use ($module) {
                    foreach ($module->unsetAjaxBundles as $bundle) {
                        unset($e->sender->assetBundles[$bundle]);
                    }
                });
            } */
            //static::checkSignature('manage', $data);
            return $this->renderAjax($nodeView, ['params' => $params]);
        };
		
        return self::process(
            $callback,
            Yii::t('kvtree', 'Error while viewing the node. Please try again later.'),
            null
        );
    }
    /**
     * Processes a code block and catches exceptions
     *
     * @param Closure $callback   the function to execute (this returns a valid `$success`)
     * @param string  $msgError   the default error message to return
     * @param string  $msgSuccess the default success error message to return
     *
     * @return array outcome of the code consisting of following keys:
     * - 'out': string, the output content
     * - 'status': string, success or error
     */
    public static function process($callback, $msgError, $msgSuccess)
    {
        $error = $msgError;
        try {
            $success = call_user_func($callback);
        } catch (DbException $e) {
            $success = false;
            $error = $e->getMessage();
        } catch (NotSupportedException $e) {
            $success = false;
            $error = $e->getMessage();
        } catch (InvalidParamException $e) {
            $success = false;
            $error = $e->getMessage();
        } catch (InvalidConfigException $e) {
            $success = false;
            $error = $e->getMessage();
        } catch (InvalidCallException $e) {
            $success = false;
            $error = $e->getMessage();
        } catch (Exception $e) {
            $success = false;
            $error = $e->getMessage();
        }
        if ($success !== false) {
            $out = $msgSuccess === null ? $success : $msgSuccess;
            return ['out' => $out, 'status' => 'success'];
        } else {
            return ['out' => $error, 'status' => 'error'];
        }
    }
}
