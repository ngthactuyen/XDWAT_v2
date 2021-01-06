<?php

class User
{
    public $id;
    public $role_id;
    public $username;
    public $password;
    public $email;
    public $phone;
    public $address;
    public $created_at;
    public $updated_at;
    public function __construct($data = [])
    {
        $this->id = $data['id'];
        $this->role_id = $data['role_id'];
        $this->username = $data['username'];
        $this->password = $data['password'];
        $this->email = $data['email'];
        $this->phone = $data['phone'];
        $this->address = $data['address'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
