<?php namespace App\Models;
 
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
 
class PenemuModel extends Model{
    
    protected $table = 'penemu';
    protected $allowedFields = ['id_user','nama_penemu','id_penemu'];

    public function getRowIdUser($id_user){
        return $this->where(['id_user' => $id_user])->first();
    }

    public function getID($id){
        return $this->where(['id_penemu' => $id])->first();
    }
}
