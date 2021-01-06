<?php


class Role
{
    public $id;
    public $name;
    public $description;
    public $created_at;
    public $updated_at;

    public function __construct($data = '')
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}