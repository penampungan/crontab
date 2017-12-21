<?php

namespace frontend\backend\dashboard\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\filters\ContentNegotiator;
use yii\web\Response;

/**
 * FoodtownController implements the CRUD actions for Foodtown model.
 */
class DataController extends Controller
{
	public function behaviors(){
        return ArrayHelper::merge(parent::behaviors(), [
			'bootstrap'=> [
				'class' => ContentNegotiator::className(),
				'formats' => [
					'application/json' => Response::FORMAT_JSON,'charset' => 'UTF-8',
				],
				'languages' => [
					'en',
					'de',
				],
			],
			'corsFilter' => [
				'class' => \yii\filters\Cors::className(),
				'cors' => [
					// restrict access to
					//'Origin' => ['http://lukisongroup.com','http://www.lukisongroup.com','http://labtest1-erp.int'],
					'Origin' => ['*'],
					'Access-Control-Request-Method' => ['POST', 'PUT','GET'],
					// Allow only POST and PUT methods
					'Access-Control-Request-Headers' => ['X-Wsse'],
					// Allow only headers 'X-Wsse'
					'Access-Control-Allow-Credentials' => true,
					// Allow OPTIONS caching
					'Access-Control-Max-Age' => 3600,
					// Allow the X-Pagination-Current-Page header to be exposed to the browser.
					'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
				]		
			],
        ]);	
	} 	  
    
    
    public function actionChart1()
    {
       $data1='
			{
				"chart": {
					"caption": " TRANSAKSI TOKO",
					"subCaption": "3 Days",
					"captionFontSize": "12",
					"subcaptionFontSize": "10",
					"subcaptionFontBold": "0",
					"paletteColors": "#0B1234,#68acff,#00fd83,#e700c4,#8900ff,#fb0909,#0000ff,#ff4040,#7fff00,#ff7f24,#ff7256,#ffb90f,#006400,#030303,#ff69b4,#8b814c,#3f6b52,#744f4f,#6fae93,#858006,#426506,#055c5a,#a7630d,#4d8a9c,#449f9c,#8da9ab,#c4dfdd,#bf7793,#559e96,#afca84,#608e97,#806d88,#688b94,#b5dfe7,#b29cba,#83adb5,#c7bbc9,#2d5867,#e1e9b7,#bcd2d0,#f96161,#c9bbbb,#bfc5ce,#8f6d4d,#a87f99,#62909b,#a0acc0,#94b9b8",
					"bgcolor": "#ffffff",
					"showBorder": "0",
					"showShadow": "0",
					"usePlotGradientColor": "0",
					"legendBorderAlpha": "0",
					"legendShadow": "0",
					"showAxisLines": "1",
					"showAlternateHGridColor": "0",
					"divlineThickness": "1",
					"divLineIsDashed": "0",
					"divLineDashLen": "1",
					"divLineGapLen": "1",
					"vDivLineDashed": "0",
					"numVDivLines": "6",
					"vDivLineThickness": "1",
					"xAxisName": "Hour",
					"yAxisName": "Total Transaction",
					"anchorradius": "3",
					"plotHighlightEffect": "fadeout|color=#f6f5fd, alpha=60",
					"showValues": "0",
					"rotateValues": "0",
					"placeValuesInside": "0",
					"formatNumberScale": "0",
					"decimalSeparator": ",",
					"thousandSeparator": ".",
					"numberPrefix": "",
					"ValuePadding": "0",
					"yAxisValuesStep": "1",
					"xAxisValuesStep": "0",
					"yAxisMaxvalue": "200",
					"yAxisMinValue": "0",
					"numDivLines": "10",
					"xAxisNamePadding": "30",
					"showHoverEffect": "1",
					"animation": "1"
				},
				"categories": [
					{
						"category": [
							{
								"label": "10"
							},
							{
								"label": "11"
							},
							{
								"label": "12"
							},
							{
								"label": "13"
							},
							{
								"label": "14"
							},
							{
								"label": "15"
							},
							{
								"label": "16"
							},
							{
								"label": "17"
							},
							{
								"label": "18"
							},
							{
								"label": "19"
							},
							{
								"label": "20"
							},
							{
								"label": "21"
							},
							{
								"label": "22"
							}
						]
					}
				],
				"dataset": [
					{
						"seriesname": "TOKO A",
						"data": null
					},
					{
						"seriesname": "TOKO B",
						"data": [
							{
								"label": "10",
								"value": "54",
								"anchorBgColor": "#68acff"
							},
							{
								"label": "11",
								"value": "46",
								"anchorBgColor": "#68acff"
							},
							{
								"label": "12",
								"value": "160",
								"anchorBgColor": "#68acff"
							},
							{
								"label": "13",
								"value": "139",
								"anchorBgColor": "#68acff"
							},
							{
								"label": "14",
								"value": "127",
								"anchorBgColor": "#68acff"
							},
							{
								"label": "15",
								"value": "118",
								"anchorBgColor": "#68acff"
							},
							{
								"label": "16",
								"value": "84",
								"anchorBgColor": "#68acff"
							},
							{
								"label": "17",
								"value": "116",
								"anchorBgColor": "#68acff"
							},
							{
								"label": "18",
								"value": "139",
								"anchorBgColor": "#68acff"
							},
							{
								"label": "19",
								"value": "123",
								"anchorBgColor": "#68acff"
							},
							{
								"label": "20",
								"value": "53",
								"anchorBgColor": "#68acff"
							},
							{
								"label": "21",
								"value": "21",
								"anchorBgColor": "#68acff"
							}
						]
					},
					{
						"seriesname": "TOKO C",
						"data": [
							{
								"label": "10",
								"value": "15",
								"anchorBgColor": "#00fd83"
							},
							{
								"label": "11",
								"value": "59",
								"anchorBgColor": "#00fd83"
							},
							{
								"label": "12",
								"value": "100",
								"anchorBgColor": "#00fd83"
							},
							{
								"label": "13",
								"value": "82",
								"anchorBgColor": "#00fd83"
							},
							{
								"label": "14",
								"value": "79",
								"anchorBgColor": "#00fd83"
							},
							{
								"label": "15",
								"value": "54",
								"anchorBgColor": "#00fd83"
							},
							{
								"label": "16",
								"value": "55",
								"anchorBgColor": "#00fd83"
							},
							{
								"label": "17",
								"value": "111",
								"anchorBgColor": "#00fd83"
							},
							{
								"label": "18",
								"value": "168",
								"anchorBgColor": "#00fd83"
							},
							{
								"label": "19",
								"value": "139",
								"anchorBgColor": "#00fd83"
							},
							{
								"label": "20",
								"value": "120",
								"anchorBgColor": "#00fd83"
							},
							{
								"label": "21",
								"value": "27",
								"anchorBgColor": "#00fd83"
							}
						]
					}
				]
			}  
	   ';
	   return json::decode($data1);
    }
}
