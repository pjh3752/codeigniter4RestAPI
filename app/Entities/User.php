<?php namespace App\Entities;
 
use CodeIgniter\Entity;
 
class User extends Entity
{
<<<<<<< HEAD
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

=======
    protected $attributes = [
        'name' => null,
        'email' => null,
    ];
 
    // filter on create/update data if necessary
    public function setName(string $name): self
    {
        $this->attributes['name'] = strtoupper($name);
        return $this;
    }
 
    // filter on create/update data if necessary
    public function setEmail(string $email): self
    {
        $this->attributes['email'] = ucwords($email);
        return $this;
    }
>>>>>>> 7f73cc8... user 등록, 상세조회, 목록조회 작업완료
}