<?php namespace App\Models;
 
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
 
class PenemuModel extends Model{
    
    protected $table = 'penemu';
    protected $allowedFields = ['id_user','nama_user','id_penemu', 'no_telepon', 'img'];

    public function getRowIdUser($id_user){
        return $this->where(['id_user' => $id_user])->first();
    }

    public function getID($id){
        return $this->where(['id_penemu' => $id])->first();
    }

    public function updateUser($id,$data){
        $db      = \Config\Database::connect();
        $builder = $db->table($this->table);

        $builder->where('id_user', $id);
        $builder->update($data);
    }
}
