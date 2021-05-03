<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class BarangModel extends Model
{   
    protected $korban;
    protected $penemu;
    protected $session;
    protected $table = 'barang';
    protected $allowedFields = ['id_barang', 'id_korban','kd_hilang','kd_approve', 'id_penemu', 'nama_barang', 'kategori_barang', 'jenis_barang','waktu_barang','lokasi_barang','deskripsi_barang','foto_barang'];

    public function updateKP($id, $data)
    {
        return $this->db->table('barang')->where(["id_barang" => $id])->set($data)->update();
    }
    
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

    public function getBarangKehilanganSelf($row){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $where = [
            'id_korban'  => $row['id'],
            'kd_approve' => 'AP-01',
            'kd_hilang'  => 'ST-00'
        ];

        $query = $builder->getWhere($where);
        return $query->getResult();
    }

    public function getBarangPenemuanSelf($row){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $where = [
            'id_penemu'  => $row['id'],
            'kd_approve' => 'AP-01',
            'kd_hilang'  => 'ST-00'
        ];

        $query = $builder->getWhere($where);
        return $query->getResult();
    }

    public function getBarangKehilanganNotApp($row){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $where = [
            'id_korban'  => $row['id'],
            'kd_approve' => 'AP-00',
            'kd_hilang'  => 'ST-00'
        ];

        $query = $builder->getWhere($where);
        return $query->getResult();
    }

    public function getBarangPenemuanNotApp($row){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $where = [
            'id_penemu'  => $row['id'],
            'kd_approve' => 'AP-00',
            'kd_hilang'  => 'ST-00'
        ];

        $query = $builder->getWhere($where);
        return $query->getResult();
    }

    public function getBarangKehilanganAdmin(){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $null = NULL;
        $where = [
            'id_penemu'  => $null,
            'kd_approve' => 'AP-00',
            'kd_hilang'  => 'ST-00'
        ];

        $query = $builder->getWhere($where);
        return $query->getResult();
    }

    public function getBarangPenemuanAdmin(){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $null = NULL;
        $where = [
            'id_korban'  => $null,
            'kd_approve' => 'AP-00',
            'kd_hilang'  => 'ST-00'
        ];

        $query = $builder->getWhere($where);
        return $query->getResult();
    }
}
