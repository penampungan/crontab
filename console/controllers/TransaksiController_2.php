<?php
namespace console\controllers;

use Yii;
use yii\base\DynamicModel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Request;
use yii\helpers\Json;
use yii\data\ArrayDataProvider;
use yii\console\Controller;			
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use console\models\Cronjob;
class TransaksiController extends Controller
{
    public function behaviors()
    {
        return [
			'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ]
        ];
    }

	
	public function actionTransDetail(){

		$model = Cronjob::find()->where(['STT'=>1])->all();
		
		foreach ($model as $row => $val){
			$rslt[]=$val['TABEL'];		
			$sqlstr="
					#======================================
					# trans_penjualan_detail_summary_daily
					#======================================
					INSERT INTO trans_penjualan_detail_summary_daily(
					ID,ACCESS_GROUP,STORE_ID,TAHUN,BULAN,TGL,
					PRODUCT_ID,PRODUCT_NM,PRODUCT_PROVIDER,PRODUCT_PROVIDER_NO,PRODUCT_PROVIDER_NM,
					PRODUCT_QTY,HPP,HARGA_JUAL,SUB_TOTAL,CREATE_AT
					  )
					 SELECT
					tsd1.ID,td1.ACCESS_GROUP,td1.STORE_ID,td1.TAHUN,td1.BULAN,td1.TGL
					,td1.PRODUCT_ID,td1.PRODUCT_NM,td1.PRODUCT_PROVIDER,td1.PRODUCT_PROVIDER_NO,td1.PRODUCT_PROVIDER_NM
					,td1.PRODUCT_QTY,td1.HPP,td1.HARGA_JUAL,td1.SUB_TOTAL,td1.CREATE_AT
					 FROM
					( SELECT 
						  ACCESS_GROUP,STORE_ID,YEAR(TRANS_DATE)AS TAHUN,MONTH(TRANS_DATE) AS BULAN,date(TRANS_DATE) AS TGL,
						  PRODUCT_ID,PRODUCT_NM,PRODUCT_PROVIDER,PRODUCT_PROVIDER_NO,PRODUCT_PROVIDER_NM,
						  SUM(PRODUCT_QTY) AS PRODUCT_QTY,HPP,HARGA_JUAL,
						  SUM(PRODUCT_QTY * HARGA_JUAL) AS SUB_TOTAL,min(TRANS_DATE) AS CREATE_AT
					  FROM trans_penjualan_detail
					  WHERE ACCESS_GROUP='170726220936' AND STORE_ID='170726220936.0001' AND date(TRANS_DATE)=date(CURRENT_DATE())
					  GROUP BY ACCESS_GROUP,STORE_ID,PRODUCT_ID,date(TRANS_DATE)
					  ORDER BY ACCESS_GROUP,STORE_ID,PRODUCT_ID,date(TRANS_DATE)
					) td1 LEFT JOIN trans_penjualan_detail_summary_daily tsd1 ON tsd1.ACCESS_GROUP=td1.ACCESS_GROUP AND tsd1.STORE_ID=td1.STORE_ID AND tsd1.TAHUN=td1.TAHUN AND tsd1.BULAN=td1.BULAN AND tsd1.TGL=td1.TGL AND tsd1.PRODUCT_ID=td1.PRODUCT_ID
				 ON DUPLICATE KEY UPDATE PRODUCT_QTY=td1.PRODUCT_QTY,HPP=td1.HPP,HARGA_JUAL=td1.HARGA_JUAL,SUB_TOTAL=td1.SUB_TOTAL
			";
			Yii::$app->db->createCommand($sqlstr)->execute();
			//==UPDATE==
			$modelUpdate = Cronjob::find()->where(['TABEL'=>$val['TABEL'],'ACCESS_GROUP'=>$val['ACCESS_GROUP'],'STORE_ID'=>$val['STORE_ID']])->one();
			$modelUpdate->STT=0;
			$modelUpdate->UPDATE_CRONJOB=$val['UPDATE_TABEL'];;
			$modelUpdate->save();			
		};
		// print_r($rslt);
		// die();	
	}
}
?>