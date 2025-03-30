<?php
session_start();

class Product
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $image;

    public function __construct($id, $name, $price, $description, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
    }
}
