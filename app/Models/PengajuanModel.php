<?php namespace App\Models;
 
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
 
class PengajuanModel extends Model{

    protected $table = 'pengajuan_barang';
    protected $allowedFields = ['id_pengajuan','id_barang','id_korban', 'id_penemu', 'id_admin', 'konfirmasi_pengajuan'];

    public function getBarangPengajuanKehilangan($id_barang, $id_status)
    {
    //id_status adalah kode yang menentukan apakah barang tersebut penemuan atau kehilangan
        
        //mengget menggunakan join table
        //di sini adalah hubungan penemu dengang pengajuan barang
        //mengambil data orang yang mengakui kehilangan barang tersebut
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('pengajuan_barang.id_barang as id_barang, pengajuan_barang.id_korban as id_korban , penemu.nama_user as nama_user, penemu.no_telepon as no_telepon, pengajuan_barang.waktu_diajukan as waktu_diajukan');
        $builder->join('penemu', 'penemu.id_penemu = pengajuan_barang.id_penemu');

        $query = $builder->get()->getResult();
        return $query;
    }

    public function getBarangPengajuanPenemuan($id_barang, $id_status)
    {
    //id_status adalah kode yang menentukan apakah barang tersebut penemuan atau kehilangan
        
        //mengget menggunakan join table
        //mengambil data untuk orang yang mengakui bahwa dia menemukan barang tersebut
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('pengajuan_barang.id_barang as id_barang, pengajuan_barang.id_penemu as id_penemu , korban.nama_user as nama_user, korban.no_telepon as no_telepon, pengajuan_barang.waktu_diajukan as waktu_diajukan');
        $builder->join('korban', 'korban.id_korban = pengajuan_barang.id_korban');

        $query = $builder->get()->getResult();
        return $query;
    }
}
    
