<?php


class Ticket
{
    public $id;
    public $user_id;
    public $status;
    public $borrow_date;
    public $return_date;
    public $created_at;
    public $updated_at;

    public function __construct($data = '')
    {
        $this->id = $data['id'];
        $this->user_id = $data['user_id'];
        $this->status = $data['status'];
        $this->borrow_date = $data['borrow_date'];
        $this->return_date = $data['return_date'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}