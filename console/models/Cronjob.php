<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "cronjob".
 *
 * @property string $ID
 * @property string $TABEL
 * @property string $ACCESS_GROUP
 * @property string $STORE_ID
 * @property string $UPDATE_TABEL
 * @property string $UPDATE_CRONJOB
 * @property integer $STT
 */
class Cronjob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cronjob';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('production_api');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UPDATE_TABEL', 'UPDATE_CRONJOB'], 'safe'],
            [['STT'], 'integer'],
            [['TABEL'], 'string', 'max' => 255],
            [['ACCESS_GROUP', 'STORE_ID'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TABEL' => 'Tabel',
            'ACCESS_GROUP' => 'Access  Group',
            'STORE_ID' => 'Store  ID',
            'UPDATE_TABEL' => 'Update  Tabel',
            'UPDATE_CRONJOB' => 'Update  Cronjob',
            'STT' => 'Stt',
        ];
    }
}
