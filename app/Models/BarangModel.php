<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    // protected $useTimestamps = true;
    protected $allowedFields = ['id_barang', 'id_korban', 'id_penemu', 'nama_barang', 'jenis_barang','waktu_barang','lokasi_barang','deskripsi_barang','foto_barang'];


    public function getBarang($slug = false)
    {
            return $this->findAll();
    }

    // public function getKomik($slug = false)
    // {
    //     if ($slug == false) {
    //         return $this->findAll();
    //     }
    //     return $this->where(['slug' => $slug])->first();
    // }
}
