<?php namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $returnType = User::class;
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'name', 
        'nickname',
        'password',
        'phone',
        'email',
        'gender'
    ];
    //protected $validationRules    = [ 'contents'   => 'required'  ]; 
}