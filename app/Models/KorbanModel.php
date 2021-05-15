<?php namespace App\Models;
 
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
 
class KorbanModel extends Model{

    protected $table = 'korban';
    protected $allowedFields = ['id_user','nama_user','id_korban', 'no_telepon', 'img'];

    public function getRowIdUser($id_user){
        return $this->where(['id_user' => $id_user])->first();
    }

    public function getID($id){
        return $this->where(['id_korban' => $id])->first();
    }

    public function updateUser($id,$data){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $builder->where('id_user', $id);
        $builder->update($data);
    }
}
    
