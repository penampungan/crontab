<?php
/**
 * Created by PhpStorm.
 * User: ptr.nov
 * Date: 10/08/15
 * Time: 19:44
 */

namespace common\components;
use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\base\Component;
use Yii\base\Model;
use yii\data\ArrayDataProvider;
use yii\helpers\Json;
use yii\debug\components\search\Filter;
use yii\debug\components\search\matchers;



/** 
  * ARRAY HELEPER CUSTOMIZE REPORTING
  * @author ptrnov  <piter@lukison.com>
  * @since 1.1
  * Yii::$app->rpt->function_name;
*/
class Reporting extends Component{	

	/**
	 *  PER-STORE PRODUCT SUM-QTY.
	 *  Yii::$app->rpt->perStoreProductTerjualQty();
	*/
	public static function dailyPerStoreProductTerjualQty($strId,$tgl)
	{
		// $strId='170726220936.0001';
		// $tgl='2017-09-29';
		$qtyRupiah=0;		//orderby[0=qty;1=rupiah]
		$limit=0;			
		$sort='DESC';		
		$dateRslt=self::source1($strId,$tgl,$tgl,$qtyRupiah,$limit,$sort);
		//return $dateRslt;
		if(count($dateRslt)){
			foreach($dateRslt as $row){
				$rsltLbl[]=$row['PRODUCT_NM'];
				$rsltVal[]=$row['PRODUCT_QTY'];
			};						
			$rslt["label"]=$rsltLbl;
			$rslt["value"]=$rsltVal;
		}else{
			$rslt["label"]=["none"];
			$rslt["value"]=[0];
			
		}
		return $rslt;
	}
	
	/**
	 *  PER-STORE PRODUCT SUM-HARGA/RUPIAH.
	 *  Yii::$app->rpt->perStoreProductTerjualQty();
	*/
	public static function dailyPerStoreProductTerjualRupiah($strId,$tgl)
	{
		$qtyRupiah=1;
		$limit=0;
		$sort='DESC';
		$dateRslt=self::source1($strId,$tgl,$tgl,$qtyRupiah,$limit,$sort);
		if(count($dateRslt)){
			foreach($dateRslt as $row){
				$rsltLbl[]=$row['PRODUCT_NM'];
				$rsltVal[]=$row['SUB_HARGA_JUAL'];
			};						
			$rslt["label"]=$rsltLbl;
			$rslt["value"]=$rsltVal;
		}else{
			$rslt["label"]=["none"];
			$rslt["value"]=[0];
			
		}
		return $rslt;
	}
	
	/**
	 *  PER-STORE PRODUCT SUM-QTY TOP-5.
	 *  Yii::$app->rpt->perStoreProductTerjualQty();
	*/
	public static function dailyPerStoreProductTerjualQtyTop5($strId,$tgl)
	{
		$qtyRupiah=0;		//orderby[0=qty;1=rupiah]
		$limit=5;			
		$sort='DESC';		
		$dateRslt=self::source1($strId,$tgl,$tgl,$qtyRupiah,$limit,$sort);
			if(count($dateRslt)){
			foreach($dateRslt as $row){
				$rsltLbl[]=$row['PRODUCT_NM'];
				$rsltVal[]=$row['PRODUCT_QTY'];
			};						
			$rslt["label"]=$rsltLbl;
			$rslt["value"]=$rsltVal;
		}else{
			$rslt["label"]=["none"];
			$rslt["value"]=[0];
			
		}
		return $rslt;
	}
	
	/**
	 *  PER-STORE PRODUCT SUM-HARGA/RUPIAH.
	 *  Yii::$app->rpt->perStoreProductTerjualQty();
	*/
	public static function dailyPerStoreProductTerjualRupiahTop5($strId,$tgl)
	{
		$qtyRupiah=1;
		$limit=5;
		$sort='DESC';
		$dateRslt=self::source1($strId,$tgl,$tgl,$qtyRupiah,$limit,$sort);
		if(count($dateRslt)){
			foreach($dateRslt as $row){
				$rsltLbl[]=$row['PRODUCT_NM'];
				$rsltVal[]=$row['SUB_HARGA_JUAL'];
			};						
			$rslt["label"]=$rsltLbl;
			$rslt["value"]=$rsltVal;
		}else{
			$rslt["label"]=["none"];
			$rslt["value"]=[0];
			
		}
		return $rslt;
	}
	
	
	/**
	 *  PER-STORE TYPE_PEMBAYARAN, JUMLAH/QTY PRODAK
	 *  Yii::$app->rpt->dailyPerStoreTypePembayaranJumlah();
	*/
	public static function dailyPerStoreTypePembayaranJumlah($strId,$tgl)
	{
		$qtyRupiah=0;
		$limit=1;
		$sort='DESC';
		$dateRslt=self::source2($strId,$tgl,$tgl,$qtyRupiah,$limit,$sort);
		if(count($dateRslt)){
			foreach($dateRslt as $row){				
				$rsltVal[]=$row['TUNAI_QTY'];
				$rsltVal[]=$row['EDC_QTY'];
				$rsltVal[]=$row['CC_QTY'];
			};		
			$rsltLbl[]='TUNAI';			
			$rsltLbl[]='EDC';			
			$rsltLbl[]='CC';			
			$rslt["label"]=$rsltLbl;
			$rslt["value"]=$rsltVal;
		}else{
			$rslt["label"]=["none"];
			$rslt["value"]=[0];
			
		}
		return $rslt;
	}
	
	/**
	 *  PER-STORE TYPE_PEMBAYARAN, JUMLAH/Rupiah PRODAK
	 *  Yii::$app->rpt->dailyPerStoreTypePembayaranRupiah();
	*/
	public static function dailyPerStoreTypePembayaranRupiah($strId,$tgl)
	{
		$qtyRupiah=1;
		$limit=1;
		$sort='DESC';
		$dateRslt=self::source2($strId,$tgl,$tgl,$qtyRupiah,$limit,$sort);
		if(count($dateRslt)){
			foreach($dateRslt as $row){				
				$rsltVal[]=$row['TUNAI_HARGA'];
				$rsltVal[]=$row['EDC_HARGA'];
				$rsltVal[]=$row['CC_HARGA'];
			};		
			$rsltLbl[]='TUNAI';			
			$rsltLbl[]='EDC';			
			$rsltLbl[]='CC';			
			$rslt["label"]=$rsltLbl;
			$rslt["value"]=$rsltVal;
		}else{
			$rslt["label"]=["none"];
			$rslt["value"]=[0];
			
		}
		return $rslt;
	} 
	
	
	
	/**
	 *  QUERY PRODUCT QTY AND PRICE.
	 *  LIMIT [int] & sort [ASC/DESC]
	 *  $qtyRupiah=[0=QTY,1=rupiah]
	*/
	private static function source1($storeID,$inTgl1,$inTgl2='',$qtyRupiah=0,$limit=0,$sort='ASC'){
		$strId=$storeID;
		$tmpTgl2=$inTgl2!=''?$inTgl2:$inTgl1;
	    $tgl1=date("Y-m-d", strtotime($inTgl1));
	    $tgl2=date("Y-m-d", strtotime($tmpTgl2));
		$year1=date("Y", strtotime($inTgl1));
		$year2=date("Y", strtotime($tmpTgl2));
		$bln1=date("m", strtotime($inTgl1));
		$bln2=date("m", strtotime($tmpTgl2));
		// $strId='170726220936.0001';
		// $tgl1='2017-09-29';
		// $tgl2='2017-09-29';
		// $year1='2017';
		// $year2='2017';
		// $bln1='09';
		// $bln2='09';		
		$sql1=" SELECT 	#x2.TRANS_DATE,x1.PRODUCT_ID,x1.HARGA_JUAL,x1.DISCOUNT,
						x1.PRODUCT_NM,sum(x1.PRODUCT_QTY) as PRODUCT_QTY ,
						sum(x1.PRODUCT_QTY * x1.HARGA_JUAL) as SUB_HARGA_JUAL				
				FROM trans_penjualan_detail  x1 
				LEFT JOIN trans_penjualan_header x2 
				ON x2.ACCESS_GROUP=x1.ACCESS_GROUP AND x2.STORE_ID=x1.STORE_ID AND x1.TRANS_ID=x2.TRANS_ID
				WHERE  ((x1.YEAR_AT BETWEEN '".$year1."' AND '".$year2."') AND (x1.MONTH_AT BETWEEN '".$bln1."' AND '".$bln2."') AND
						(x2.YEAR_AT BETWEEN '".$year1."' AND '".$year2."') AND (x2.MONTH_AT BETWEEN '".$bln1."' AND '".$bln2."')
					   ) AND
					   x1.STORE_ID='".$strId."' AND      
					   (date(x1.TRANS_DATE) BETWEEN '".$tgl1."' AND '".$tgl2."')
				GROUP BY x1.PRODUCT_ID
		";	
		$sql_Limit=$limit!=0?" LIMIT "." ".$limit:'';
		$sql_Qty=($sort=='ASC'?" ORDER BY PRODUCT_QTY ASC".$sql_Limit:" ORDER BY PRODUCT_QTY DESC".$sql_Limit);
		$sql_Rupiah=($sort=='ASC'?" ORDER BY SUB_HARGA_JUAL ASC ".$sql_Limit:" ORDER BY SUB_HARGA_JUAL DESC ".$sql_Limit);		
		
		$sqlStr=($qtyRupiah==0?$sql1.$sql_Qty:$sql1.$sql_Rupiah);		
		// return $sqlStr;
		
		$qrySql= Yii::$app->production_api->createCommand($sqlStr)->queryAll(); 		
		$dataProvider= new ArrayDataProvider([	
			'allModels'=>$qrySql,	
			'pagination' => [
				'pageSize' =>100000,
			],			
		]);		
		return $dataProvider->getModels(); 
	}
	
	/**
	 *  TYPE_PEMBAYARAN JUMLAH dalam QTY AND PRICE.
	 *  LIMIT [int] & sort [ASC/DESC]
	 *  $qtyRupiah=[0=QTY,1=rupiah]
	*/
	private static function source2($storeID,$inTgl1,$inTgl2='',$qtyRupiah=0,$limit=0,$sort='ASC'){
		$strId=$storeID;
		$tmpTgl2=$inTgl2!=''?$inTgl2:$inTgl1;
	    $tgl1=date("Y-m-d", strtotime($inTgl1));
	    $tgl2=date("Y-m-d", strtotime($tmpTgl2));
		$year1=date("Y", strtotime($inTgl1));
		$year2=date("Y", strtotime($tmpTgl2));
		$bln1=date("m", strtotime($inTgl1));
		$bln2=date("m", strtotime($tmpTgl2));
		$sql1=" SELECT 	#x2.TRANS_DATE,x1.PRODUCT_ID,x1.HARGA_JUAL,x1.DISCOUNT,
						x1.PRODUCT_NM,sum(x1.PRODUCT_QTY) as PRODUCT_QTY ,
						sum(x1.PRODUCT_QTY * x1.HARGA_JUAL) as SUB_HARGA_JUAL,
						SUM(CASE WHEN x2.TYPE_PAY_ID=0 THEN x1.PRODUCT_QTY  ELSE 0 END) AS TUNAI_QTY,
						SUM(CASE WHEN x2.TYPE_PAY_ID=2 THEN x1.PRODUCT_QTY  ELSE 0 END) AS EDC_QTY,
						SUM(CASE WHEN x2.TYPE_PAY_ID=3 THEN x1.PRODUCT_QTY  ELSE 0 END) AS CC_QTY,
						SUM(CASE WHEN x2.TYPE_PAY_ID=0 THEN x1.PRODUCT_QTY * x1.HARGA_JUAL  ELSE 0 END) AS TUNAI_HARGA,
						SUM(CASE WHEN x2.TYPE_PAY_ID=2 THEN x1.PRODUCT_QTY * x1.HARGA_JUAL  ELSE 0 END) AS EDC_HARGA,
						SUM(CASE WHEN x2.TYPE_PAY_ID=3 THEN x1.PRODUCT_QTY * x1.HARGA_JUAL  ELSE 0 END) AS CC_HARGA								
				FROM trans_penjualan_detail  x1 
				LEFT JOIN trans_penjualan_header x2 
				ON x2.ACCESS_GROUP=x1.ACCESS_GROUP AND x2.STORE_ID=x1.STORE_ID AND x1.TRANS_ID=x2.TRANS_ID
				WHERE  ((x1.YEAR_AT BETWEEN '".$year1."' AND '".$year2."') AND (x1.MONTH_AT BETWEEN '".$bln1."' AND '".$bln2."') AND
						(x2.YEAR_AT BETWEEN '".$year1."' AND '".$year2."') AND (x2.MONTH_AT BETWEEN '".$bln1."' AND '".$bln2."')
					   ) AND
					   x1.STORE_ID='".$strId."' AND      
					   (date(x1.TRANS_DATE) BETWEEN '".$tgl1."' AND '".$tgl2."')
				GROUP BY date(x1.TRANS_DATE)
		";	
		$sql_Limit=$limit!=0?" LIMIT "." ".$limit:'';
		$sql_Qty=($sort=='ASC'?" ORDER BY PRODUCT_QTY ASC".$sql_Limit:" ORDER BY PRODUCT_QTY DESC".$sql_Limit);
		$sql_Rupiah=($sort=='ASC'?" ORDER BY SUB_HARGA_JUAL ASC ".$sql_Limit:" ORDER BY SUB_HARGA_JUAL DESC ".$sql_Limit);			
		$sqlStr=($qtyRupiah==0?$sql1.$sql_Qty:$sql1.$sql_Rupiah);		
		
		// return $sqlStr;
		
		$qrySql= Yii::$app->production_api->createCommand($sqlStr)->queryAll(); 		
		$dataProvider= new ArrayDataProvider([	
			'allModels'=>$qrySql,	
			'pagination' => [
				'pageSize' =>100000,
			],			
		]);		
		return $dataProvider->getModels(); 
	}
	
	
}