<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_layanan".
 *
 * @property int $id_layanan
 * @property string $jenis_layanan
 * @property string $time_create
 *
 * @property TrxRegistrasi[] $trxRegistrasis
 */
class MasterLayanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_layanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_layanan'], 'required'],
            [['time_create'], 'safe'],
            [['jenis_layanan'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_layanan' => 'Id Layanan',
            'jenis_layanan' => 'Jenis Layanan',
            'time_create' => 'Time Create',
        ];
    }

    /**
     * Gets query for [[TrxRegistrasis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrxRegistrasis()
    {
        return $this->hasMany(TrxRegistrasi::class, ['id_layanan' => 'id_layanan']);
    }
}
