<?php namespace App\Models;
 
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
 
class UserModel extends Model{
    protected $table = 'user';
    protected $allowedFields = ['user_name','user_email','user_password', 'user_no_telepon','user_created_at', 'user_instagram', 'user_facebook', 'user_alamat'];

    public function getUser($id){
        return $this->where(['user_id' => $id])->first();
    }
}