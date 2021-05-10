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

    public function updateKdHilang($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $builder->set('kd_hilang', 'ST-01');
        $builder->where('id_barang', $id);
        $builder->update();
    }

    public function updateKP($id, $data)
    {
        return $this->db->table('barang')->where(["id_barang" => $id])->set($data)->update();
    }

    public function deleteBarangPermintaan($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $builder->delete(['id_barang' => $id]);
    }

    public function updateBarangPermintaan($id){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $data = [
            'kd_approve' => 'AP-01'
        ];

        $builder->where('id_barang', $id);
        $builder->update($data);
    }

    public function updateBarang($id, $data){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $builder->where('id_barang', $id);
        $builder->update($data);
    }
    
    public function getBarang($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_barang' => $id])->first();
    }

    public function getBarangById($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $query = $builder->getWhere(['id_barang' => $id]);
        return $query->getResult();
    }

    public function getBarangKehilangan(){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $null = NULL;
        $where = [
            'id_penemu'  => $null,
            'kd_approve' => 'AP-01',
            'kd_hilang'  => 'ST-00'
        ];

        $query = $builder->getWhere($where);
        return $query->getResult();
    }

    public function getBarangPenemuan(){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $null = NULL;
        $where = [
            'id_korban'  => $null,
            'kd_approve' => 'AP-01',
            'kd_hilang'  => 'ST-00'
        ];

        $query = $builder->getWhere($where);
        return $query->getResult();
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
