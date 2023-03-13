<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_admin".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string $role
 * @property string $time_create
 *
 * @property TrxRegistrasi[] $trxRegistrasis
 */
class MasterAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accessToken'], 'required'],
            [['time_create'], 'safe'],
            [['username', 'password', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['role'], 'string', 'max' => 50],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'role' => 'Role',
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
        return $this->hasMany(TrxRegistrasi::class, ['petugas_pendaftaran' => 'id']);
    }
}
