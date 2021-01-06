<?php


class Right
{
    public $id;
    public $role_id;
    public $name;
    public $created_at;
    public $updated_at;

    public function __construct($data = '')
    {
        $this->id = $data['id'];
        $this->role_id = $data['role_id'];
        $this->name = $data['name'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}