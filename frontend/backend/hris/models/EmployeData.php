<?php

namespace frontend\backend\hris\models;

use Yii;

/**
 * This is the model class for table "hrd_data".
 *
 * @property string $ID
 * @property string $CREATE_BY USER CREATED
 * @property string $CREATE_AT Tanggal dibuat
 * @property string $UPDATE_BY USER UPDATE
 * @property string $UPDATE_AT Tanggal di update
 * @property int $STATUS 0=disable 1=Normal (one table items).      (Android No Stock) 2=Detail (Join Itm Hpp)     (Android USED Stock)
 * @property string $ACCESS_UNIX
 * @property string $OUTLET_CODE
 * @property string $EMP_ID
 * @property string $EMP_NM_DPN
 * @property string $EMP_NM_TGH
 * @property string $EMP_NM_BLK
 * @property string $EMP_KTP
 * @property string $EMP_ALAMAT
 * @property string $EMP_GENDER
 * @property string $EMP_STS_NIKAH
 * @property string $EMP_TLP
 * @property string $EMP_HP
 * @property string $EMP_EMAIL
 */
class EmployeData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hrd_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CREATE_AT', 'UPDATE_AT'], 'safe'],
            [['STATUS'], 'integer'],
            [['EMP_ALAMAT'], 'string'],
            [['CREATE_BY', 'UPDATE_BY', 'ACCESS_UNIX', 'OUTLET_CODE', 'EMP_ID', 'EMP_NM_DPN', 'EMP_NM_TGH', 'EMP_NM_BLK'], 'string', 'max' => 50],
            [['EMP_KTP', 'EMP_TLP', 'EMP_HP'], 'string', 'max' => 100],
            [['EMP_GENDER'], 'string', 'max' => 10],
            [['EMP_STS_NIKAH'], 'string', 'max' => 255],
            [['EMP_EMAIL'], 'string', 'max' => 150],
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
            'ACCESS_UNIX' => Yii::t('app', 'Access  Unix'),
            'OUTLET_CODE' => Yii::t('app', 'Outlet  Code'),
            'EMP_ID' => Yii::t('app', 'Emp  ID'),
            'EMP_NM_DPN' => Yii::t('app', 'Emp  Nm  Dpn'),
            'EMP_NM_TGH' => Yii::t('app', 'Emp  Nm  Tgh'),
            'EMP_NM_BLK' => Yii::t('app', 'Emp  Nm  Blk'),
            'EMP_KTP' => Yii::t('app', 'Emp  Ktp'),
            'EMP_ALAMAT' => Yii::t('app', 'Emp  Alamat'),
            'EMP_GENDER' => Yii::t('app', 'Emp  Gender'),
            'EMP_STS_NIKAH' => Yii::t('app', 'Emp  Sts  Nikah'),
            'EMP_TLP' => Yii::t('app', 'Emp  Tlp'),
            'EMP_HP' => Yii::t('app', 'Emp  Hp'),
            'EMP_EMAIL' => Yii::t('app', 'Emp  Email'),
        ];
    }
}
