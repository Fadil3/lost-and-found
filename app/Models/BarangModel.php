<?php

namespace App\Models; 

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class BarangModel extends Model
{
    protected $db;
    protected $table = 'barang';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nama_barang', 'id_korban', 'id_penemu', 'kategori_barang','waktu_barang','lokasi_barang','deskripsi_barang','foto_barang'];

    public function getBarang($id)
    {
        return $this->where(['id_barang' => $id])->first();
    }

    public function getAllBarangKorban($id)
    {
        return $this->where('id_korban', $id)->findAll();
    }

    public function getAllBarangPenemu($id)
    {
        return $this->where('id_penemu', $id)->findAll();
    }

    public function updateKP($id, $data)
    {
        return $this->db->table('barang')->where(["id_barang" => $id])->set($data)->update();
    }
}
