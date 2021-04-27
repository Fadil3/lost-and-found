<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusBarangModel extends Model
{
    protected $table = 'status_barang';
    // protected $useTimestamps = true;
    protected $allowedFields = ['id_barang', 'status_barang'];
}
