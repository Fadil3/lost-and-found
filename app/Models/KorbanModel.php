<?php namespace App\Models;
 
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
 
class KorbanModel extends Model{

    protected $table = 'korban';
    protected $allowedFields = ['id_user','nama_korban'];

    public function getRowIdUser($id_user){
        return $this->where(['id_user' => $id_user])->first();
    }
}