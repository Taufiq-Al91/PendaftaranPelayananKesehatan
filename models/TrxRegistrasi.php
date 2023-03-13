<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trx_registrasi".
 *
 * @property int $id
 * @property string $nama_pasien
 * @property string $jenis_kelamin
 * @property string $tanggal_lahir
 * @property string $jenis_registrasi
 * @property int $id_layanan
 * @property string $jenis_pembayaran
 * @property string $status_registrasi
 * @property string $waktu_mulai_pelayanan
 * @property string $waktu_selesai_pelayanan
 * @property string $time_create
 * @property int $petugas_pendaftaran
 *
 * @property MasterLayanan $layanan
 * @property MasterAdmin $petugasPendaftaran
 */
class TrxRegistrasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trx_registrasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pasien', 'jenis_kelamin', 'tanggal_lahir', 'jenis_registrasi', 'id_layanan', 'jenis_pembayaran', 'status_registrasi', 'waktu_mulai_pelayanan', 'waktu_selesai_pelayanan', 'petugas_pendaftaran'], 'required'],
            [['tanggal_lahir', 'waktu_mulai_pelayanan', 'waktu_selesai_pelayanan', 'time_create'], 'safe'],
            [['id_layanan', 'petugas_pendaftaran'], 'integer'],
            [['nama_pasien', 'jenis_kelamin', 'jenis_registrasi', 'jenis_pembayaran', 'status_registrasi'], 'string', 'max' => 80],
            [['id_layanan'], 'exist', 'skipOnError' => true, 'targetClass' => MasterLayanan::class, 'targetAttribute' => ['id_layanan' => 'id_layanan']],
            [['petugas_pendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => MasterAdmin::class, 'targetAttribute' => ['petugas_pendaftaran' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_pasien' => 'Nama Pasien',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_registrasi' => 'Jenis Registrasi',
            'id_layanan' => 'Id Layanan',
            'jenis_pembayaran' => 'Jenis Pembayaran',
            'status_registrasi' => 'Status Registrasi',
            'waktu_mulai_pelayanan' => 'Waktu Mulai Pelayanan',
            'waktu_selesai_pelayanan' => 'Waktu Selesai Pelayanan',
            'time_create' => 'Time Create',
            'petugas_pendaftaran' => 'Petugas Pendaftaran',
        ];
    }

    /**
     * Gets query for [[Layanan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLayanan()
    {
        return $this->hasOne(MasterLayanan::class, ['id_layanan' => 'id_layanan']);
    }

    /**
     * Gets query for [[PetugasPendaftaran]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPetugas()
    {
        return $this->hasOne(MasterAdmin::class, ['id' => 'petugas_pendaftaran']);
    }
}
