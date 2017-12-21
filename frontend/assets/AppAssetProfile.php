<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAssetProfile extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		//w3 modify.
		'template/ptr_front_smoth/css/border.css',
		'template/ptr_front_smoth/css/border-theme-blue-grey.css'
    ];
    public $depends = [
		'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset', 
    ];
}
