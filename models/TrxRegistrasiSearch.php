<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrxRegistrasi;

/**
 * TrxRegistrasiSearch represents the model behind the search form of `app\models\TrxRegistrasi`.
 */
class TrxRegistrasiSearch extends TrxRegistrasi
{
    public $jenis_layanan;
    public $petugas_pendaftaran;
  
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'no_registrasi', 'id_layanan', 'petugas_pendaftaran'], 'integer'],
            [['nama_pasien', 'jenis_kelamin', 'tanggal_lahir', 'jenis_registrasi', 'jenis_pembayaran', 'status_registrasi', 'waktu_mulai_pelayanan', 'waktu_selesai_pelayanan', 'time_create', 'jenis_layanan','petugas_pendaftaran'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TrxRegistrasi::find();
        $query->innerJoin('master_layanan', 'trx_registrasi.id_layanan = master_layanan.id_layanan');
        $query->innerJoin('master_admin', 'trx_registrasi.petugas_pendaftaran = master_admin.id');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'no_registrasi' => $this->no_registrasi,
            'tanggal_lahir' => $this->tanggal_lahir,
            'id_layanan' => $this->id_layanan,
            'waktu_mulai_pelayanan' => $this->waktu_mulai_pelayanan,
            'waktu_selesai_pelayanan' => $this->waktu_selesai_pelayanan,
            'time_create' => $this->time_create,
            'petugas_pendaftaran' => $this->petugas_pendaftaran,
        ]);

        $query->andFilterWhere(['like', 'nama_pasien', $this->nama_pasien])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'jenis_registrasi', $this->jenis_registrasi])
            ->andFilterWhere(['like', 'jenis_pembayaran', $this->jenis_pembayaran])
            ->andFilterWhere(['like', 'status_registrasi', $this->status_registrasi])
            ->andFilterWhere(['like', 'master_layanan.jenis_layanan', $this->jenis_layanan])
            ->andFilterWhere(['like', 'master_admin.username', $this->petugas_pendaftaran]);

        return $dataProvider;
    }
}
