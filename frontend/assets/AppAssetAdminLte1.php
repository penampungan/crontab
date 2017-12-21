<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAssetAdminLte extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'template/adminLTE/css/AdminLTE.css'
    ];
    /* public $js = [
		//freelancer modify,
		'template/ptr_front_smoth/js/jquery.easing.min.js',
		'template/ptr_front_smoth/js/front_smoth.js',			//modify source front_smoth.js, Note requrement jquery.min.js
			
    ]; */
    public $depends = [
		'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset', 
    ];
	
	public $jsOptions = array(
		'position' => \yii\web\View::POS_END,// POS_HEAD, //POS_END, 
	);
}
