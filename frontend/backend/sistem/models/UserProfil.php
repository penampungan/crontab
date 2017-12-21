<?php

namespace app\backend\sistem\models;

use Yii;

/**
 * This is the model class for table "user_profil".
 *
 * @property string $ACCESS_UNIX
 * @property string $NM_DEPAN
 * @property string $NM_TENGAH
 * @property string $NM_BELAKANG
 * @property string $KTP
 * @property string $ALMAT
 * @property string $LAHIR_TEMPAT
 * @property string $LAHIR_TGL
 * @property string $LAHIR_GENDER
 * @property string $HP
 * @property string $EMAIL
 * @property string $CREATE_BY
 * @property string $CREATE_AT
 * @property string $UPDATE_BY
 * @property string $UPDATE_AT
 */
class UserProfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ACCESS_UNIX'], 'required'],
            [['ALMAT'], 'string'],
            [['LAHIR_TGL', 'CREATE_AT', 'UPDATE_AT'], 'safe'],
            [['ACCESS_UNIX', 'NM_DEPAN', 'NM_TENGAH', 'NM_BELAKANG', 'KTP', 'LAHIR_GENDER', 'HP', 'CREATE_BY', 'UPDATE_BY'], 'string', 'max' => 50],
            [['LAHIR_TEMPAT'], 'string', 'max' => 255],
            [['EMAIL'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ACCESS_UNIX' => 'Access  Unix',
            'NM_DEPAN' => 'Nm  Depan',
            'NM_TENGAH' => 'Nm  Tengah',
            'NM_BELAKANG' => 'Nm  Belakang',
            'KTP' => 'Ktp',
            'ALMAT' => 'Almat',
            'LAHIR_TEMPAT' => 'Lahir  Tempat',
            'LAHIR_TGL' => 'Lahir  Tgl',
            'LAHIR_GENDER' => 'Lahir  Gender',
            'HP' => 'Hp',
            'EMAIL' => 'Email',
            'CREATE_BY' => 'Create  By',
            'CREATE_AT' => 'Create  At',
            'UPDATE_BY' => 'Update  By',
            'UPDATE_AT' => 'Update  At',
        ];
    }
}
