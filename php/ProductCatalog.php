<?php

require_once 'Product.php';
class ProductCatalog
{
    private $products = [];

    public function __construct()
    {
        $this->products = [
            // Long Pasta Collection
            new Product(201, 'Spaghetti', 4.99, 'Classic long, thin cylindrical pasta', '../images/Spaghetti_Image.jpg'),
            new Product(202, 'Fettuccine', 6.49, 'Flat, thick noodles for creamy sauces', '../images/Fettucine_Image.jpg'),
            new Product(203, 'Linguine', 5.79, 'Flat, narrow pasta for seafood', '../images/Linguine.jpeg'),

            // Short Pasta Collection
            new Product(101, 'Farfalle', 5.99, 'Bow-tie shaped pasta perfect for creamy and tomato-based sauces', '../images/Farfalle_Image.jpg'),
            new Product(102, 'Rigatoni', 6.49, 'Tube-shaped pasta with ridges ideal for thick, hearty sauces', '../images/Rigatoni_Image.jpg'),
            new Product(103, 'Shells', 5.79, 'Spiral-shaped pasta that captures pesto and chunky sauces beautifully', '../images/Shells_Image.jpg'),
        ];
    }

    // Method to get all products
    public function getAllProducts()
    {
        return $this->products;
    }

    // Method to get product by ID
    public function getProductById($id)
    {
        foreach ($this->products as $product) {
            if ($product->id == $id) {
                return $product;
            }
        }
        return null;
    }
}
