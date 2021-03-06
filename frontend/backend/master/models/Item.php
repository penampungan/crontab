<?php

namespace frontend\backend\master\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\UploadedFile;


use frontend\backend\master\models\ItemImage;
use frontend\backend\master\models\ItemSatuan;

//Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/backend/master/image/';
class Item extends \yii\db\ActiveRecord
{
	public $satuanStt=0;
	public $image;
	public $imageNmTmp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['ITEM_NM','STATUS'], 'required','on'=>'create'],
            [['ACCESS_UNIX','DEFAULT_HARGA','DEFAULT_STOCK','CREATE_AT', 'UPDATE_AT','satuanStt','image','imageNmTmp','ITEMGRP','ITEM_QR'], 'safe'],
            [['STATUS'], 'integer'],
            [['CREATE_BY', 'UPDATE_BY', 'ITEM_ID', 'OUTLET_CODE'], 'string', 'max' => 50],
            [['ITEM_NM','SATUAN'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CREATE_BY' => Yii::t('app', 'Create  By'),
            'CREATE_AT' => Yii::t('app', 'Create  At'),
            'UPDATE_BY' => Yii::t('app', 'Update  By'),
            'UPDATE_AT' => Yii::t('app', 'Update  At'),
            'STATUS' => Yii::t('app', 'STATUS'),
			'ACCESS_UNIX' => Yii::t('app', 'Access Unix'),
			'OUTLET_CODE' => Yii::t('app', 'OUTLET.CODE'),
            'ITEM_ID' => Yii::t('app', 'ITEM.ID'),
            'ITEM_QR' => Yii::t('app', 'ITEM_QR'),            
            'ITEM_NM' => Yii::t('app', 'ITEM NAME'),
            'SATUAN' => Yii::t('app', 'SATUAN'),
            'ITEMGRP' => Yii::t('app', 'ITEMGRP'),
            'DEFAULT_STOCK' => Yii::t('app', 'DEFAULT_STOCK'),
            'DEFAULT_HARGA' => Yii::t('app', 'DEFAULT_HARGA'),
            'itemsImage64' => Yii::t('app', 'IMAGE'),
        ];
    }
	
	
	//RELEATIONSHIP ITEMS - IMAGE
	public function getImageTbl(){
		return $this->hasOne(ItemImage::className(), ['OUTLET_CODE' => 'OUTLET_CODE'])->andWhere('FIND_IN_SET(ACCESS_UNIX,"'.$this->ACCESS_UNIX.'")')->andWhere(['ITEM_ID'=>$this->ITEM_ID]);
	}
	
	public function getItemsImage64(){
		$dataImg= $this->imageTbl['IMG64'];
		return $dataImg!=''?$dataImg:$this->noimage;
	}
	
	public function getNoimage(){
		$gambarkosong="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";
		return $gambarkosong;			
	}
	
	//RELEATIONSHIP ITEMS - SATUAN FOR FILTER.
	public function getSatuanStandartTbl(){
		
		return $this->hasMany(ItemSatuan::className(), ['STATUS' =>'satuanStt'])->orderBy(['UPDATE_BY'=>SORT_ASC,'CREATE_BY'=>SORT_ASC]);
	}
	
	//RELEATIONSHIP ITEMS - SATUAN FOR FILTER.
	public function getSatuanStoreTbl(){
		return $this->hasMany(ItemSatuan::className(), ['OUTLET_CODE' => 'OUTLET_CODE'])->andWhere('FIND_IN_SET(ACCESS_UNIX,"'.$this->ACCESS_UNIX.'")')->orderBy(['UPDATE_BY'=>SORT_ASC,'CREATE_BY'=>SORT_ASC]);
	}
	
	public function getSatuanFilter(){
		$satuanStandart=$this->satuanStandartTbl;
		$satuanStore=$this->satuanStoreTbl;
		$satuanFilter=ArrayHelper::merge($satuanStore,$satuanStandart);
		return $satuanFilter;
	}
	
	//IMG BASE64.	
	//SAVE FISIK GAMBAR
	// public function pathImage()
    // {
		// $pic = isset($this->SATUAN) ? $this->SATUAN : 'default.jpg';
		// return Yii::$app->params['uploadPath'].$pic;
    // }
	public function uploadImage(){
		$imageRslt=UploadedFile::getInstance($this,'image');
		if (empty($imageRslt)) {
            return false;
        }
		//Extend split.
		//$ext = end((explode(".", $image1->name)));	
		//$nmItem=$this->SATUAN;
       // generate a unique file name
		//$this->SATUAN = "{$nmItem}" ."-".date('ymdHis').".{$ext}";		
		return $imageRslt;
	}
}
