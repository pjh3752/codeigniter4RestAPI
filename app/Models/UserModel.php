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
<<<<<<< HEAD

    protected $validationRules = [
        'name'      => 'required|alpha_hangul|max_length[20]',
        'nickname'  => 'required|alpha_lower|max_length[30]',
        'password'  => 'required|valid_password|min_length[10]',
        'phone'     => 'required|numeric|max_length[20]',
        'email'     => 'required|valid_email|max_length[100]|is_unique[users.email]'
    ];

    protected $validationMessages = [];

    protected $skipValidation = false;
=======
    //protected $validationRules    = [ 'contents'   => 'required'  ]; 
>>>>>>> 7f73cc8... user 등록, 상세조회, 목록조회 작업완료
}