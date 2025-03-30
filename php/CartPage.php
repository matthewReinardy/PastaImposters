<?php

// Include necessary files
require_once 'Product.php';
require_once 'ProductCatalog.php';
require_once 'Cart.php';

// Start session and initialize cart
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$productCatalog = new ProductCatalog();
$cart = new Cart();

// Handle quantity updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['increase']) && isset($_POST['product_id'])) {
        $productId = intval($_POST['product_id']);
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['product']->id == $productId) {
                $item['quantity']++;
                break;
            }
        }
        unset($item); // unset the reference to avoid issues
    } elseif (isset($_POST['decrease']) && isset($_POST['product_id'])) {
        $productId = intval($_POST['product_id']);
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['product']->id == $productId) {
                $item['quantity'] = max(1, $item['quantity'] - 1);
                break;
            }
        }
        unset($item); // unset the reference to avoid issues
    } elseif (isset($_POST['remove']) && isset($_POST['product_id'])) {
        $productId = intval($_POST['product_id']);
        $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) use ($productId) {
            return $item['product']->id != $productId;
        });
    }

    // Reindex the array to avoid gaps
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    // Redirect to the same page to prevent form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Calculate totals
$subtotal = 0;
$tax_rate = 0.08;
$shipping_cost = 4.99;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Pasta Imposters</title>
    <link href="../css/Cart.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <?php include "Header.php" ?>

    <div class="cart-container">
        <div class="cart-header">
            <h1>Your Shopping Cart</h1>
            <p>Review your items and proceed to checkout</p>
        </div>

        <div class="cart-items">
            <?php if (empty($_SESSION['cart'])): ?>
                <div class="empty-cart">
                    <h2>Your cart is empty</h2>
                    <p>Looks like you haven't added any pasta to your cart yet!</p>
                    <a href="LargePasta.php" class="continue-shopping">Continue Shopping</a>
                </div>
            <?php else: ?>
                <?php foreach ($_SESSION['cart'] as $index => $item):
                    $product = $item['product'];
                    $quantity = $item['quantity'];
                    $itemTotal = $product->price * $quantity;
                    $subtotal += $itemTotal;
                ?>
                    <div class="cart-item">
                        <img src="<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>" class="item-image">
                        <div class="item-details">
                            <h3><?php echo $product->name; ?></h3>
                            <p>500g package</p>
                        </div>
                        <div class="quantity-controls">
                            <form method="POST" class="quantity-form">
                                <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                                <button type="submit" name="decrease" value="1" class="quantity-btn">-</button>
                                <span class="quantity-display"><?php echo $quantity; ?></span>
                                <button type="submit" name="increase" value="1" class="quantity-btn">+</button>
                            </form>
                        </div>
                        <span class="item-price">$<?php echo number_format($product->price, 2); ?></span>
                        <span class="item-total">$<?php echo number_format($itemTotal, 2); ?></span>
                        <form method="POST" class="remove-form">
                            <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                            <button type="submit" name="remove" value="1" class="remove-btn">✕</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php if (!empty($_SESSION['cart'])): ?>
            <div class="cart-summary">
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>$<?php echo number_format($subtotal, 2); ?></span>
                </div>
                <div class="summary-row">
                    <span>Shipping</span>
                    <span>$<?php echo number_format($shipping_cost, 2); ?></span>
                </div>
                <div class="summary-row">
                    <span>Tax</span>
                    <span>$<?php echo number_format($subtotal * $tax_rate, 2); ?></span>
                </div>
                <div class="summary-row total">
                    <span>Total</span>
                    <span>$<?php echo number_format($subtotal + ($subtotal * $tax_rate) + $shipping_cost, 2); ?></span>
                </div>
                <form method="POST" action="Checkout.php">
                    <button type="submit" class="checkout-btn">Proceed to Checkout</button>
                </form>
            </div>
        <?php endif; ?>
    </div>

    <?php include "Footer.php" ?>
</body>

</html>