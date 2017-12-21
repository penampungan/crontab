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
use console\models\Store;
class OpnameStockController extends Controller
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

	/**===================
	 *  STOCK OPNAME AHKIR BULAN 
	 * ===================
	*/
	public function actionStart(){
		$TGL=date('Y-m-d');
		$crnDate = date('Y-m-d');						//CURRENT DATE
		$crnTime = date('h:i:s');						//CURRENT TIME
		$lastday = date('Y-m-t',strtotime($crnDate));   //LAST DATE OF MONTH
		// print_r($lastday);
		// die();
		if ($lastday==$crnDate AND '23:00:00'< $crnTime){
			$model = Store::find()->OrderBy(['ACCESS_GROUP'=>SORT_ASC,'STORE_ID'=>SORT_ASC])->all();		
			foreach ($model as $row => $val){
				//$rslt[]=$val['ACCESS_GROUP'];		
				$sqlstr1="
					#===========================
					# STOCK OPNAME AHKIR BULAN 
					#=========================== 
					INSERT INTO product_stock_closing(
						ID,ACCESS_GROUP,STORE_ID,PRODUCT_ID,TAHUN,BULAN,
						STOCK_AWAL,STOCK_AWAL_ACTUAL,STOCK_BARU,STOCK_TERJUAL,STOCK_AKHIR,STOCK_AKHIR_ACTUAL,				  
						CREATE_AT
					)
					SELECT * 
					FROM (
							SELECT inv.ID,inv.ACCESS_GROUP,inv.STORE_ID,inv.PRODUCT_ID,inv.TAHUN,inv.BULAN,
								(CASE WHEN inv.STOCK_AKHIR IS NOT NULL THEN inv.STOCK_AKHIR ELSE 0 END) AS STOCK_AWAL,
								(CASE WHEN inv.STOCK_AKHIR_ACTUAL IS NOT NULL THEN inv.STOCK_AKHIR_ACTUAL ELSE 0 END) AS STOCK_AWAL_ACTUAL,
								sum(inv.STOCK_BARU) AS STOCK_BARU,
								SUM(inv.STOCK_TERJUAL) AS STOCK_TERJUAL,
								(inv.STOCK_AKHIR_ACTUAL + SUM(inv.STOCK_BARU)-SUM(inv.STOCK_TERJUAL)) AS STOCK_AKHIR,
								(inv.STOCK_AKHIR_ACTUAL + SUM(inv.STOCK_BARU)-SUM(inv.STOCK_TERJUAL)) AS STOCK_AKHIR_ACTUAL,
								CONCAT(CURDATE(),' ', CURRENT_TIME()) AS CREATE_AT
							FROM
							 (	SELECT
									 x5.ID,x1.ACCESS_GROUP,x1.STORE_ID,x1.TAHUN,x1.BULAN,x1.TGL,x1.PRODUCT_ID,
									(CASE WHEN x1.PRODUCT_QTY<>'' THEN x1.PRODUCT_QTY ELSE '0' END) AS  STOCK_TERJUAL,
									(CASE WHEN x3.INPUT_STOCK<>'' THEN x3.INPUT_STOCK ELSE '0' END) AS  STOCK_BARU,
									 x4.STOCK_AKHIR,
									(CASE WHEN x4.STOCK_AKHIR<>x4.STOCK_AKHIR_ACTUAL THEN x4.STOCK_AKHIR_ACTUAL ELSE x4.STOCK_AKHIR END) AS STOCK_AKHIR_ACTUAL
								FROM
								(
									SELECT ACCESS_GROUP,STORE_ID,TAHUN,BULAN,TGL,PRODUCT_ID,PRODUCT_NM,PRODUCT_QTY
									FROM trans_penjualan_detail_summary_daily
									WHERE ACCESS_GROUP='".$val['ACCESS_GROUP']."' AND STORE_ID='".$val['STORE_ID']."' AND  TGL BETWEEN concat(date_format(LAST_DAY('".$TGL."' - interval 0 month),'%Y-%m-'),'01') AND LAST_DAY('".$TGL."')
								)x1 LEFT JOIN
								(
									SELECT ACCESS_GROUP,STORE_ID,PRODUCT_ID,INPUT_DATE,sum(INPUT_STOCK) as INPUT_STOCK
									FROM product_stock
									WHERE ACCESS_GROUP='".$val['ACCESS_GROUP']."' AND STORE_ID='".$val['STORE_ID']."' AND  (INPUT_DATE BETWEEN concat(date_format(LAST_DAY('".$TGL."' - interval 0 month),'%Y-%m-'),'01') AND LAST_DAY('".$TGL."'))
									GROUP BY STORE_ID,PRODUCT_ID,INPUT_DATE
								)x3 ON x3.ACCESS_GROUP=x1.ACCESS_GROUP AND x3.STORE_ID=x1.STORE_ID AND x3.PRODUCT_ID=x1.PRODUCT_ID AND x3.INPUT_DATE=x1.TGL LEFT JOIN
								(
									#PR PENGAMBILAN STOCK HANYA BULAN SEBELUMNYA, JILA KURANG DARI BULAN SEBELUMYA MAKA KOSONG
									SELECT ACCESS_GROUP,STORE_ID,PRODUCT_ID,TAHUN,BULAN,STOCK_AKHIR,STOCK_AKHIR_ACTUAL
									FROM product_stock_closing
									WHERE ACCESS_GROUP='".$val['ACCESS_GROUP']."' AND STORE_ID='".$val['STORE_ID']."' AND #TAHUN=YEAR('".$TGL."') AND BULAN=MONTH('".$TGL."')
											 TAHUN=year(concat(date_format(LAST_DAY('".$TGL."' - interval 1 month),'%Y-%m-'),'01')) AND 
											 BULAN=month(concat(date_format(LAST_DAY('".$TGL."' - interval 1 month),'%Y-%m-'),'01')) LIMIT 1
								)x4 ON x4.ACCESS_GROUP=x1.ACCESS_GROUP AND x4.STORE_ID=x1.STORE_ID AND x4.PRODUCT_ID=x1.PRODUCT_ID LEFT JOIN
								(
									SELECT ID,ACCESS_GROUP,STORE_ID,PRODUCT_ID,TAHUN,BULAN
									FROM product_stock_closing
									WHERE ACCESS_GROUP='".$val['ACCESS_GROUP']."' AND STORE_ID='".$val['STORE_ID']."' AND TAHUN=YEAR('".$TGL."') AND BULAN=MONTH('".$TGL."')
								)x5 ON x5.ACCESS_GROUP=x1.ACCESS_GROUP AND x5.STORE_ID=x1.STORE_ID AND x5.PRODUCT_ID=x1.PRODUCT_ID AND x5.TAHUN=year('".$TGL."') AND x5.BULAN=month('".$TGL."')
							) inv
							GROUP BY inv.STORE_ID,inv.PRODUCT_ID,inv.BULAN
							ORDER BY inv.PRODUCT_ID,inv.TGL
					)inv1
					ON DUPLICATE KEY UPDATE
						TAHUN=inv1.TAHUN,BULAN=inv1.BULAN,
						STOCK_AWAL=inv1.STOCK_AWAL,STOCK_AWAL_ACTUAL=inv1.STOCK_AWAL_ACTUAL,
						STOCK_BARU=inv1.STOCK_BARU,STOCK_TERJUAL=inv1.STOCK_TERJUAL,
						STOCK_AKHIR=inv1.STOCK_AKHIR,STOCK_AKHIR_ACTUAL=inv1.STOCK_AKHIR_ACTUAL;			
				";
				
				Yii::$app->db->createCommand($sqlstr1)->execute();
			} 
		};
		
		// print_r($rslt);
		// die();	
	}
}
?>