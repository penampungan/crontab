<?php

namespace frontend\backend\hris\models;

use Yii;

use frontend\backend\hris\models\EmployeData;

class EmployeAbsen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrd_absen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CREATE_AT', 'UPDATE_AT', 'TGL', 'WAKTU'], 'safe'],
            [['STATUS'], 'integer'],
            [['CREATE_BY', 'UPDATE_BY', 'EMP_ID','OUTLET_CODE'], 'string', 'max' => 50],
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
            'STATUS' => Yii::t('app', 'Status'),
            'EMP_ID' => Yii::t('app', 'Emp  ID'),
            'OUTLET_CODE' => Yii::t('app', 'Outlet Code'),
            'TGL' => Yii::t('app', 'Tgl'),
            'WAKTU' => Yii::t('app', 'WAKTU'),
        ];
    }
	
	public function getEmployeTbl(){
		return $this->hasOne(EmployeData::ClassName(),['EMP_ID'=>'EMP_ID']);
	}
	public function getEmployeNM(){
		return $this->employeTbl!=''?$this->employeTbl->EMP_NM_DPN .' '.$this->employeTbl->EMP_NM_TGH. ' '.$this->employeTbl->EMP_NM_BLK:'None';
	}
}
