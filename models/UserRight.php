<?php


class UserRight
{
    public $id;
    public $user_id;
    public $right_id;
    public $created_at;
    public $updated_at;

    public function __construct($data = '')
    {
        $this->id = $data['id'];
        $this->user_id = $data['user_id'];
        $this->right_id = $data['right_id'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}