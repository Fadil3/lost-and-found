<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nama_barang', 'kategori_barang','waktu_barang','lokasi_barang','deskripsi_barang','foto_barang'];

    public function getBarang($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_barang' => $id])->first();
    }
}
