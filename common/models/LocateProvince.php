<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "c0001g1".
 *
 * @property integer $PROVINCE_ID
 * @property string $PROVINCE
 */
class LocateProvince extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locate_province';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PROVINCE'], 'required'],
            [['PROVINCE_ID'], 'integer'],
            [['PROVINCE'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PROVINCE_ID' => 'Province  ID',
            'PROVINCE' => 'Province',
        ];
    }
}
