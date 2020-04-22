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

    public function setName(string $name): self
    {
        $this->attributes['name'] = $name;
        return $this;
    }
 
    public function setEmail(string $email): self
    {
        $this->attributes['email'] = $email;
        return $this;
    }

    public function setPassword(string $password): self
    {
        // encrypt password
        $encrypter = service('encrypter');
        $this->attributes['password'] = base64_encode($encrypter->encrypt($password));
        return $this;
    }

}