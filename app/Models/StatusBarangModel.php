<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusBarangModel extends Model
{
    protected $table = 'status_barang';
    protected $allowedFields = ['id_barang'];
}
