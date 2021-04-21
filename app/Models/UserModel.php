<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class UserModel extends Model{
    protected $table = 'user';
    protected $allowedFields = ['user_name','user_email','user_password', 'user_no_telepon','user_created_at', 'user_instagram', 'user_facebook'];
}