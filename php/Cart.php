<?php

class Cart
{
    private $products = [];
    private $total = 0;
    private $tax_rate = 0.08;
    private $shipping_cost = 4.99;

    public function __construct()
    {
        // Initialize cart in session if not exists
        if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $this->products = &$_SESSION['cart'];
    }

    public function addProduct($product, $quantity = 1)
    {
        // Check if product already exists in cart
        foreach ($this->products as &$item) {
            if ($item['product']->id == $product->id) {
                $item['quantity'] += $quantity;
                $this->calculateTotal();
                return true;
            }
        }
        // Add new product to cart
        $this->products[] = [
            'product' => $product,
            'quantity' => $quantity
        ];
        $this->calculateTotal();
        return true;
    }

    // Additional cart methods would be implemented here
    public function calculateTotal()
    {
        // Placeholder for total calculation
        $this->total = 0;
        foreach ($this->products as $item) {
            $this->total += $item['product']->price * $item['quantity'];
        }
        return $this->total;
    }
}

// Example Usage
$productCatalog = new ProductCatalog();
$cart = new Cart();

// Demonstration of catalog methods
$allProducts = $productCatalog->getAllProducts();
$specificProduct = $productCatalog->getProductById(201);  // Get Spaghetti
