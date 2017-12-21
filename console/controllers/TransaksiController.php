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

	/**===================
	 *  DAILY  TRANSAKSI
	 * ===================
	*/
	public function actionTransDetail(){

		$model = Cronjob::find()->where(['TABEL'=>'TRANSAKSI','STT'=>1])->all();		
		foreach ($model as $row => $val){
			//$rslt[]=$val['TABEL'];		
			$sqlstr1="
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
						( 	SELECT 
								ACCESS_GROUP,STORE_ID,YEAR(TRANS_DATE)AS TAHUN,MONTH(TRANS_DATE) AS BULAN,date(TRANS_DATE) AS TGL,
								PRODUCT_ID,PRODUCT_NM,PRODUCT_PROVIDER,PRODUCT_PROVIDER_NO,PRODUCT_PROVIDER_NM,
								SUM(PRODUCT_QTY) AS PRODUCT_QTY,HPP,HARGA_JUAL,
								SUM(PRODUCT_QTY * HARGA_JUAL) AS SUB_TOTAL,min(TRANS_DATE) AS CREATE_AT
							FROM trans_penjualan_detail
							WHERE ACCESS_GROUP='".$val['ACCESS_GROUP']."' AND STORE_ID='".$val['STORE_ID']."' AND date(TRANS_DATE)=date(CURRENT_DATE())
							GROUP BY ACCESS_GROUP,STORE_ID,PRODUCT_ID,date(TRANS_DATE)
							ORDER BY ACCESS_GROUP,STORE_ID,PRODUCT_ID,date(TRANS_DATE)
						) td1 LEFT JOIN trans_penjualan_detail_summary_daily tsd1 ON tsd1.ACCESS_GROUP=td1.ACCESS_GROUP AND tsd1.STORE_ID=td1.STORE_ID AND tsd1.TAHUN=td1.TAHUN AND tsd1.BULAN=td1.BULAN AND tsd1.TGL=td1.TGL AND tsd1.PRODUCT_ID=td1.PRODUCT_ID
					ON DUPLICATE KEY UPDATE PRODUCT_QTY=td1.PRODUCT_QTY,HPP=td1.HPP,HARGA_JUAL=td1.HARGA_JUAL,SUB_TOTAL=td1.SUB_TOTAL
			";
			
			$sqlstr2="
				#========================================
				#  trans_penjualan_header_summary_daily
				#========================================
				INSERT INTO trans_penjualan_header_summary_daily(
						ID,ACCESS_GROUP,STORE_ID,TAHUN, BULAN,TGL,TOTAL_HPP,TOTAL_SALES,TOTAL_PRODUCT,JUMLAH_TRANSAKSI,
						CNT_TUNAI,CNT_DEBET,CNT_KREDIT,CNT_EMONEY,TTL_TUNAI,TTL_DEBET,TTL_KREDIT,TTL_EMONEY,
						CNT_BCA,CNT_MANDIRI,CNT_BNI,CNT_BRI,CREATE_AT
				)
				SELECT
						sd1.ID,thsd1.ACCESS_GROUP,thsd1.STORE_ID,thsd1.TAHUN, thsd1.BULAN,thsd1.TGL,
						thsd1.TOTAL_HPP,thsd1.TOTAL_SALES,thsd1.TOTAL_PRODUCT,thsd1.JUMLAH_TRANSAKSI,
						thsd1.CNT_TUNAI,thsd1.CNT_DEBET,thsd1.CNT_KREDIT,thsd1.CNT_EMONEY,
						thsd1.TTL_TUNAI,thsd1.TTL_DEBET,thsd1.TTL_KREDIT,thsd1.TTL_EMONEY,
						thsd1.CNT_BCA,thsd1.CNT_MANDIRI,thsd1.CNT_BNI,thsd1.CNT_BRI,
						thsd1.CREATE_AT
				FROM
					(	SELECT th1.ACCESS_GROUP,th1.STORE_ID,YEAR(th1.TRANS_DATE) AS TAHUN, MONTH(th1.TRANS_DATE) AS BULAN,DATE(th1.TRANS_DATE) AS TGL,
							sum(th1.SUB_TOTAL_HPP) as TOTAL_HPP,sum(th1.TOTAL_HARGA) as TOTAL_SALES,sum(th1.TOTAL_PRODUCT) as TOTAL_PRODUCT,COUNT(ID) AS JUMLAH_TRANSAKSI,
							COUNT(CASE WHEN th1.TYPE_PAY_ID=0 OR th1.TYPE_PAY_ID=1 THEN th1.TYPE_PAY_ID END) as CNT_TUNAI,
							COUNT(CASE WHEN th1.TYPE_PAY_ID=2 THEN th1.TYPE_PAY_ID END) as CNT_DEBET,
							COUNT(CASE WHEN th1.TYPE_PAY_ID=3 THEN th1.TYPE_PAY_ID END) as CNT_KREDIT,
							COUNT(CASE WHEN th1.TYPE_PAY_ID=5 THEN th1.TYPE_PAY_ID END) as CNT_EMONEY,
							SUM(CASE WHEN th1.TYPE_PAY_ID=0 OR th1.TYPE_PAY_ID=1 THEN th1.TOTAL_HARGA ELSE 0 END) as TTL_TUNAI, 
							SUM(CASE WHEN th1.TYPE_PAY_ID=2 THEN th1.TOTAL_HARGA ELSE 0 END) as TTL_DEBET, 
							SUM(CASE WHEN th1.TYPE_PAY_ID=3 THEN th1.TOTAL_HARGA ELSE 0 END) as TTL_KREDIT, 
							SUM(CASE WHEN th1.TYPE_PAY_ID=5 THEN th1.TOTAL_HARGA ELSE 0 END) as TTL_EMONEY, 
							COUNT(CASE WHEN th1.BANK_ID=1 THEN th1.TYPE_PAY_ID END) as CNT_BCA, 
							COUNT(CASE WHEN th1.BANK_ID=2 THEN th1.TYPE_PAY_ID END) as CNT_MANDIRI, 
							COUNT(CASE WHEN th1.BANK_ID=3 THEN th1.TYPE_PAY_ID END) as CNT_BNI, 
							COUNT(CASE WHEN th1.BANK_ID=4 THEN th1.TYPE_PAY_ID END) as CNT_BRI, 	
							max(TRANS_DATE) as CREATE_AT
						FROM trans_penjualan_header th1 
						WHERE th1.ACCESS_GROUP='".$val['ACCESS_GROUP']."' AND th1.STORE_ID='".$val['STORE_ID']."'  AND date(th1.TRANS_DATE)=date(CURRENT_DATE())
						GROUP BY th1.STORE_ID
						ORDER BY th1.STORE_ID
					) as thsd1 LEFT JOIN trans_penjualan_header_summary_daily sd1 ON sd1.ACCESS_GROUP=thsd1.ACCESS_GROUP AND sd1.STORE_ID=thsd1.STORE_ID AND sd1.TAHUN=thsd1.TAHUN AND sd1.BULAN=thsd1.BULAN AND sd1.TGL=thsd1.TGL
				ON DUPLICATE KEY UPDATE  TOTAL_HPP=thsd1.TOTAL_HPP,TOTAL_SALES=thsd1.TOTAL_SALES,TOTAL_PRODUCT=thsd1.TOTAL_PRODUCT,JUMLAH_TRANSAKSI=thsd1.JUMLAH_TRANSAKSI,									    CNT_TUNAI=thsd1.CNT_TUNAI,CNT_DEBET=thsd1.CNT_DEBET,CNT_KREDIT=thsd1.CNT_KREDIT,CNT_EMONEY=thsd1.CNT_EMONEY,									                                                            TTL_TUNAI=thsd1.TTL_TUNAI,TTL_DEBET=thsd1.TTL_DEBET,TTL_KREDIT=thsd1.TTL_KREDIT,TTL_EMONEY=thsd1.TTL_EMONEY,
										 CNT_BCA=thsd1.CNT_BCA,CNT_MANDIRI=thsd1.CNT_MANDIRI,CNT_BNI=thsd1.CNT_BNI,CNT_BRI=thsd1.CNT_BRI
			";						
			
			
			$sqlstr3="
				#=============================================
				#  trans_penjualan_header_summary_daily_hour
				#=============================================
				INSERT INTO trans_penjualan_header_summary_daily_hour(
					ID,ACCESS_GROUP,STORE_ID,TAHUN,BULAN,TGL,
				  VAL1,VAL2,VAL3,VAL4,VAL5,VAL6,VAL7,VAL8,VAL9,VAL10,VAL11,VAL12,
				  VAL13,VAL14,VAL15,VAL16,VAL17,VAL18,VAL19,VAL20,VAL21,VAL22,VAL23,VAL24,
					CREATE_AT
				)
				SELECT 
					x2.ID,x1.ACCESS_GROUP,x1.STORE_ID,x1.TAHUN,x1.BULAN,x1.TGL,
				  x1.VAL1,x1.VAL2,x1.VAL3,x1.VAL4,x1.VAL5,x1.VAL6,x1.VAL7,x1.VAL8,x1.VAL9,x1.VAL10,x1.VAL11,x1.VAL12,
				  x1.VAL13,x1.VAL14,x1.VAL15,x1.VAL16,x1.VAL17,x1.VAL18,x1.VAL19,x1.VAL20,x1.VAL21,x1.VAL22,x1.VAL23,x1.VAL24,
					x1.CREATE_AT
				FROM
				 (
					  SELECT 
							ACCESS_GROUP,STORE_ID,YEAR(TRANS_DATE) AS TAHUN,
							MONTH(TRANS_DATE) AS BULAN,DATE(TRANS_DATE) AS TGL,
							count(CASE WHEN HOUR(TRANS_DATE)='1' THEN HOUR(TRANS_DATE) END) as VAL1,	
							count(CASE WHEN HOUR(TRANS_DATE)='2' THEN HOUR(TRANS_DATE) END) as VAL2,
							count(CASE WHEN HOUR(TRANS_DATE)='3' THEN HOUR(TRANS_DATE) END) as VAL3,	
							count(CASE WHEN HOUR(TRANS_DATE)='4' THEN HOUR(TRANS_DATE) END) as VAL4,
							count(CASE WHEN HOUR(TRANS_DATE)='5' THEN HOUR(TRANS_DATE) END) as VAL5,	
							count(CASE WHEN HOUR(TRANS_DATE)='6' THEN HOUR(TRANS_DATE) END) as VAL6,
							count(CASE WHEN HOUR(TRANS_DATE)='7' THEN HOUR(TRANS_DATE) END) as VAL7,	
							count(CASE WHEN HOUR(TRANS_DATE)='8' THEN HOUR(TRANS_DATE) END) as VAL8,
							count(CASE WHEN HOUR(TRANS_DATE)='9' THEN HOUR(TRANS_DATE) END) as VAL9,	
							count(CASE WHEN HOUR(TRANS_DATE)='10' THEN HOUR(TRANS_DATE) END) as VAL10,
							count(CASE WHEN HOUR(TRANS_DATE)='11' THEN HOUR(TRANS_DATE) END) as VAL11,
							count(CASE WHEN HOUR(TRANS_DATE)='12' THEN HOUR(TRANS_DATE) END) as VAL12,
							count(CASE WHEN HOUR(TRANS_DATE)='13' THEN HOUR(TRANS_DATE) END) as VAL13,
							count(CASE WHEN HOUR(TRANS_DATE)='14' THEN HOUR(TRANS_DATE) END) as VAL14,
							count(CASE WHEN HOUR(TRANS_DATE)='15' THEN HOUR(TRANS_DATE) END) as VAL15,
							count(CASE WHEN HOUR(TRANS_DATE)='16' THEN HOUR(TRANS_DATE) END) as VAL16,
							count(CASE WHEN HOUR(TRANS_DATE)='17' THEN HOUR(TRANS_DATE) END) as VAL17,
							count(CASE WHEN HOUR(TRANS_DATE)='18' THEN HOUR(TRANS_DATE) END) as VAL18,
							count(CASE WHEN HOUR(TRANS_DATE)='19' THEN HOUR(TRANS_DATE) END) as VAL19,
							count(CASE WHEN HOUR(TRANS_DATE)='20' THEN HOUR(TRANS_DATE) END) as VAL20,
							count(CASE WHEN HOUR(TRANS_DATE)='21' THEN HOUR(TRANS_DATE) END) as VAL21,
							count(CASE WHEN HOUR(TRANS_DATE)='22' THEN HOUR(TRANS_DATE) END) as VAL22,
							count(CASE WHEN HOUR(TRANS_DATE)='23' THEN HOUR(TRANS_DATE) END) as VAL23,
							count(CASE WHEN HOUR(TRANS_DATE)='0' THEN HOUR(TRANS_DATE) END) as VAL24,
							MAX(TRANS_DATE) AS CREATE_AT
					 FROM trans_penjualan_header
					 WHERE ACCESS_GROUP='".$val['ACCESS_GROUP']."' AND STORE_ID='".$val['STORE_ID']."' AND date(TRANS_DATE)=date(CURRENT_DATE())
					 GROUP BY STORE_ID
				 ) x1 LEFT JOIN trans_penjualan_header_summary_daily_hour x2 ON x2.ACCESS_GROUP=x1.ACCESS_GROUP AND x2.STORE_ID=x1.STORE_ID AND x2.TGL=x1.TGL
				 ON DUPLICATE KEY UPDATE  VAL1=x1.VAL1,VAL2=x1.VAL2,VAL3=x1.VAL3,VAL4=x1.VAL4,VAL5=x1.VAL5,VAL6=x1.VAL6,VAL7=x1.VAL7,VAL8=x1.VAL8,VAL9=x1.VAL9,VAL10=x1.VAL10,
							VAL11=x1.VAL11,VAL12=x1.VAL12,VAL13=x1.VAL13,VAL14=x1.VAL14,VAL15=x1.VAL15,VAL16=x1.VAL16,VAL17=x1.VAL17,VAL18=x1.VAL18,VAL19=x1.VAL19,
							VAL20=x1.VAL20,VAL21=x1.VAL21,VAL22=x1.VAL22,VAL23=x1.VAL23,VAL24=x1.VAL24
			";
			
			
			
			
			Yii::$app->db->createCommand($sqlstr1)->execute();
			Yii::$app->db->createCommand($sqlstr2)->execute();
			Yii::$app->db->createCommand($sqlstr3)->execute();
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