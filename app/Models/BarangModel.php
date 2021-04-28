<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class BarangModel extends Model
{   
    protected $db;
    protected $table = 'barang';
    protected $allowedFields = ['id_barang', 'id_korban', 'id_penemu', 'nama_barang', 'kategori_barang', 'jenis_barang','waktu_barang','lokasi_barang','deskripsi_barang','foto_barang'];


    public function getBarang($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_barang' => $id])->first();
    }

    public function getBarangKehilangan(){
        return $this->where('id_korban is NOT NULL')->findAll();
    }

    public function getBarangPenemuan(){
        return $this->where('id_penemu is NOT NULL')->findAll();
    }

    public function updateKP($id, $data)
    {
        return $this->db->table('barang')->where(["id_barang" => $id])->set($data)->update();
    }
}
