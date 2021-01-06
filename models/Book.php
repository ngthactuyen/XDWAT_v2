<?php


class Book
{
    public $id;
    public $category_id;
    public $name;
    public $author;
    public $year;
    public $publisher;
    public $content;
    public $amount;
    public $price;
    public $image;
    public $created_at;
    public $updated_at;

    public function __construct($data = '')
    {
        $this->id = $data['id'];
        $this->category_id = $data['category_id'];
        $this->name = $data['name'];
        $this->author = $data['author'];
        $this->year = $data['year'];
        $this->publisher = $data['publisher'];
        $this->content = $data['content'];
        $this->amount = $data['amount'];
        $this->price = $data['price'];
        $this->image = $data['image'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}