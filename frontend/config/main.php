	<?php
$params = array_merge(
    require(__DIR__ . '/../config/params.php')
); 

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
	'modules' => [
		'gridview' => [
            'class' => '\kartik\grid\Module',
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            'i18n' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@kvgrid/messages',
                'forceTranslation' => true
            ],
        ],
		'treemanager' =>  [
			'class' => '\kartik\tree\Module',
			'treeStructure'=>[
				'treeAttribute' => 'ACCESS_UNIX',
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
			// 'treeStructure'=>[
				// 'treeAttribute' => 'ACCESS_UNIX',
				// 'leftAttribute' => 'status',
				// 'rightAttribute' => 'status',
				// 'depthAttribute' => 'ACCESS_LEVEL',
			// ],
			// 'dataStructure'=>[
				// 'keyAttribute'=>'id',
				// 'nameAttribute'=>'username',
				// 'iconAttribute'=>'ACCESS_LEVEL',
				// 'iconTypeAttribute'=>'icon_type',
			// ],
			'treeViewSettings'=> [
				'nodeView' => '@frontend/backend/sistem/views/permission/_form',
				/*'nodeActions' => '/sistem/node/manage',
				 [
					'Module::NODE_MANAGE' => '/sistem/node/manage111',
					//"Module::NODE_MANAGE" => "Url::to(['/sistem/node/manage'])",
					// Module::NODE_SAVE => Url::to(['/treemanager/node/save']),
					// Module::NODE_REMOVE => Url::to(['/treemanager/node/remove']),
					// Module::NODE_MOVE => Url::to(['/treemanager/node/move']),
				]	 */			
			]
						
			// other module settings, refer detailed documentation
		],
		'test' => [
            'class' => 'frontend\backend\test\Modul',
        ],
		'dashboard' => [
            'class' => 'frontend\backend\dashboard\Modul',
        ],
		'sistem' => [
            'class' => 'frontend\backend\sistem\Modul',
        ],
		'master' => [
            'class' => 'frontend\backend\master\Modul',
        ],
		'inventory' => [
            'class' => 'frontend\backend\inventory\Modul',
        ],
		'accounting' => [
            'class' => 'frontend\backend\accounting\Modul',
        ],
		'hris' => [
            'class' => 'frontend\backend\hris\Modul',
        ],
		'payment' => [
            'class' => 'frontend\backend\payment\Modul',
        ],
		'transaksi' => [
            'class' => 'frontend\backend\transaksi\Modul',
        ],
		'afiliasi' => [
            'class' => 'frontend\backend\afiliasi\Modul',
        ],
		'sales' => [
            'class' => 'frontend\backend\sales\Modul',
        ],
	],
    'components' => [
		'view' => [
            'theme' => [
                'pathMap' => [
                    'frontend/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/phundament/app'
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_kg', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
		'getUserOpt' =>[
            'class'=>'common\components\Useroption',
        ],
		'arrayBantuan' =>[
            'class'=>'common\components\ArrayBantuan',
        ],
		'gv' => [
            'class' =>'common\components\GridviewCustomize'
        ],
        'rpt' => [
            'class' =>'common\components\Reporting'
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];
