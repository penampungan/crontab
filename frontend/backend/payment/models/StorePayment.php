<?php

namespace frontend\backend\payment\models;

use Yii;

/**
 * This is the model class for table "store_payment".
 *
 * @property string $ID RECEVED & RELEASE: ID UNIX, POSTING URL DAN AJAX
 * @property string $CREATE_BY USER CREATED
 * @property string $CREATE_AT Tanggal dibuat
 * @property string $UPDATE_BY USER UPDATE
 * @property string $UPDATE_AT Tanggal di update
 * @property int $STATUS 0=TRIAL 1= BELUM BAYAR 2= LUNAS. 3= INVOICE EXPIRED/Dibatalkan        a. Jika telat kena abudemen sesuai            pakage/jumlah keterlambatan.        Staus=4. 4= LUNAS / TERLAMBAT. PIUTANG.      (dispensasi 3 hari) 
 * @property string $ACCESS_UNIX ACCESS_UNIX - Array Group 
 * @property string $OUTLET_CODE
 * @property string $OUTLET_NM
 * @property string $STORE_STATUS 0=TRIAL 1=Active 2=deactive (BALUM BAYAR) 3=delete  Update by DATE_START-DATE_END Join to Stote.Status
 * @property string $FAKTURE kode [ACCESS_UNIX.OUTLET_CODE.TimeStamp].  AUTO GENERATE [masa tenggang 8 hari]
 * @property string $FAKTURE_DATE
 * @property int $FAKTURE_TEMPO 8 Hari, invoice expired =   STATUS=3
 * @property string $PAY_PAKAGE TANGGAL AKHIR PEMBAYARAN. FORMULA  1. Jumlah Pembayaran 2. lama waktu aktif
 * @property string $PAY_DATE Jika  DATE FROM table Store.END_DATE.
 * @property int $PAY_DURATION_ACTIVE
 * @property int $PAY_DURATION_BONUS
 * @property string $PAY_TOTAL
 */
class StorePayment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'store_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CREATE_AT', 'UPDATE_AT', 'FAKTURE_DATE', 'PAY_PAKAGE', 'PAY_DATE'], 'safe'],
            [['STATUS', 'STORE_STATUS', 'FAKTURE_TEMPO', 'PAY_DURATION_ACTIVE', 'PAY_DURATION_BONUS'], 'integer'],
            [['ACCESS_UNIX'], 'string'],
            [['PAY_TOTAL'], 'number'],
            [['CREATE_BY', 'UPDATE_BY', 'OUTLET_CODE', 'FAKTURE'], 'string', 'max' => 50],
            [['OUTLET_NM'], 'string', 'max' => 100],
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
            'OUTLET_NM' => Yii::t('app', 'Outlet  Nm'),
            'STORE_STATUS' => Yii::t('app', 'Store  Status'),
            'FAKTURE' => Yii::t('app', 'Fakture'),
            'FAKTURE_DATE' => Yii::t('app', 'Fakture  Date'),
            'FAKTURE_TEMPO' => Yii::t('app', 'Fakture  Tempo'),
            'PAY_PAKAGE' => Yii::t('app', 'Pay  Pakage'),
            'PAY_DATE' => Yii::t('app', 'Pay  Date'),
            'PAY_DURATION_ACTIVE' => Yii::t('app', 'Pay  Duration  Active'),
            'PAY_DURATION_BONUS' => Yii::t('app', 'Pay  Duration  Bonus'),
            'PAY_TOTAL' => Yii::t('app', 'Pay  Total'),
        ];
    }
}
