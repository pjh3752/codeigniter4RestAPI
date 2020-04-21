<?php namespace App\Entities;
 
use CodeIgniter\Entity;
 
class User extends Entity
{
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
}