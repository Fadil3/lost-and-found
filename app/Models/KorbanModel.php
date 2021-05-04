<?php namespace App\Models;
 
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
 
class KorbanModel extends Model{

    protected $table = 'korban';
    protected $allowedFields = ['id_user','nama_korban','id_korban'];

    public function getRowIdUser($id_user){
        return $this->where(['id_user' => $id_user])->first();
    }

    public function getID($id){
        return $this->where(['id_korban' => $id])->first();
    }
}
