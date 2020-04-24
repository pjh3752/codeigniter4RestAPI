<?php namespace App\Entities;
 
use CodeIgniter\Entity;
 
class User extends Entity
{
    protected $modelName = 'App\Models\UserModel';
    
    protected $attributes = [
        'id'        => null,
        'name'      => null,
        'email'     => null,
        'nickname'  => null,
        'password'  => null,
        'phone'     => null,
        'email'     => null,
        'gender'    => null
    ];

    public function setPassword(string $password)
    {
        // encrypt password
        $this->attributes['password'] = password_hash($password, PASSWORD_BCRYPT);
        return $this;
    }

}