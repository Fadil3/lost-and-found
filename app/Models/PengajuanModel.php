<?php namespace App\Models;
 
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
 
class PengajuanModel extends Model{

    protected $table = 'pengajuan_barang';
    protected $allowedFields = ['id_pengajuan','id_barang','id_korban', 'id_penemu', 'id_admin', 'konfirmasi_pengajuan'];

    //untuk mengupdate pada data korban yang menemukan barangnya
    public function updateKonfirmasiKehilangan($id_barang, $id_klaim)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $builder->set('konfirmasi_pengajuan', 1);
        $builder->where('id_barang', $id_barang);
        $builder->where('id_penemu', $id_klaim);
        $builder->update();
    }

    //untuk mengupdate pada data yang dimana ditemukan barangnya
    public function updateKonfirmasiPenemuan($id_barang, $id_klaim)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $builder->set('konfirmasi_pengajuan', 1);
        $builder->where('id_barang', $id_barang);
        $builder->where('id_korban', $id_klaim);
        $builder->update();
    }

    public function deletePengajuan($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $builder->where('id_pengajuan', $id);
        $builder->delete();
    }

    //mengget semua data yang berstatus konfirmasi 1
    public function getBarangSelesai()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('pengajuan_barang.id_barang as id_barang, pengajuan_barang.konfirmasi_pengajuan as konfirmasi_pengajuan , barang.nama_barang as nama_barang, barang.lokasi_barang as lokasi_barang, barang.kd_hilang as kd_hilang');
        $builder->join('barang', 'barang.id_barang = pengajuan_barang.id_barang');

        $query = $builder->get()->getResult();
        return $query;
    }

    public function getBarangPengajuanKehilangan($id_barang, $id_status)
    {
    //id_status adalah kode yang menentukan apakah barang tersebut penemuan atau kehilangan
        
        //mengget menggunakan join table
        //di sini adalah hubungan penemu dengang pengajuan barang
        //mengambil data orang yang mengakui kehilangan barang tersebut
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('pengajuan_barang.id_pengajuan as id_pengajuan ,pengajuan_barang.id_barang as id_barang, pengajuan_barang.id_korban as id_korban, pengajuan_barang.id_penemu as id_penemu , pengajuan_barang.konfirmasi_pengajuan as konfirmasi_pengajuan ,penemu.nama_user as nama_user, penemu.no_telepon as no_telepon, pengajuan_barang.waktu_diajukan as waktu_diajukan');
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
        $builder->select('pengajuan_barang.id_pengajuan as id_pengajuan, pengajuan_barang.id_barang as id_barang, pengajuan_barang.id_penemu as id_penemu, pengajuan_barang.id_korban as id_korban , pengajuan_barang.konfirmasi_pengajuan as konfirmasi_pengajuan , korban.nama_user as nama_user, korban.no_telepon as no_telepon, pengajuan_barang.waktu_diajukan as waktu_diajukan');
        $builder->join('korban', 'korban.id_korban = pengajuan_barang.id_korban');

        $query = $builder->get()->getResult();
        return $query;
    }
}
    
