<?php

namespace frontend\backend\afiliasi\models;

use Yii;

/**
 * This is the model class for table "afiliasi".
 *
 * @property string $ID RECEVED & RELEASE: ID UNIX, POSTING URL DAN AJAX
 * @property string $CREATE_BY USER CREATED
 * @property string $CREATE_AT Tanggal dibuat
 * @property string $UPDATE_BY USER UPDATE
 * @property string $UPDATE_AT Tanggal di update
 * @property int $STATUS 0=deactive    1=active
 * @property string $ACCESS_UNIX
 * @property string $AFILIASI_KODE
 * @property string $AFILIASI_URL
 * @property string $PAKAGE
 * @property string $PAKAGE_NM
 * @property int $PAKAGE_DURATION DURATION 1 bulan 3 bulan = gratis 15 hari. 6 bulan = gratis 30 hari 12 bulan = gratis 60 hari
 * @property string $PAKAGE_PRICE TANGGAL AKHIR PEMBAYARAN. FORMULA  1. Jumlah Pembayaran 2. lama waktu aktif
 */
class Afiliasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'afiliasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CREATE_AT', 'UPDATE_AT'], 'safe'],
            [['STATUS', 'PAKAGE_DURATION'], 'integer'],
            [['AFILIASI_URL'], 'string'],
            [['PAKAGE_PRICE'], 'number'],
            [['CREATE_BY', 'UPDATE_BY', 'ACCESS_UNIX', 'AFILIASI_KODE', 'PAKAGE'], 'string', 'max' => 50],
            [['PAKAGE_NM'], 'string', 'max' => 100],
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
            'AFILIASI_KODE' => Yii::t('app', 'Afiliasi  Kode'),
            'AFILIASI_URL' => Yii::t('app', 'Afiliasi  Url'),
            'PAKAGE' => Yii::t('app', 'Pakage'),
            'PAKAGE_NM' => Yii::t('app', 'Pakage  Nm'),
            'PAKAGE_DURATION' => Yii::t('app', 'Pakage  Duration'),
            'PAKAGE_PRICE' => Yii::t('app', 'Pakage  Price'),
        ];
    }
}
