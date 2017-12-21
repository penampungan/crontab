<?php

namespace frontend\backend\sistem\controllers;

use yii\web\Controller;
use Yii;
use Closure;
use Exception;
use yii\db\Exception as DbException;
use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;
use yii\base\NotSupportedException;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Response;
use yii\base\InvalidCallException;
use yii\web\View;
use yii\base\Event;
use kartik\tree\TreeView;
use kartik\tree\models\Tree;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
