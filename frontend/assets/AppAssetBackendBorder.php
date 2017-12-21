<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAssetBackendBorder extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		//w3 modify.
		'template/border/w3.css',
		//'template/border/w3-theme-blue-grey'
    ];
    public $depends = [
		'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset', 
    ];
}
