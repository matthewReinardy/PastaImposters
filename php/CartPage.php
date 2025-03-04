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
    <!-- Navigation Bar (same as main page) -->

    <?php include "Header.php" ?>

    <div class="cart-container">
        <div class="cart-header">
            <h1>Your Shopping Cart</h1>
            <p>Review your items and proceed to checkout</p>
        </div>

        <div class="cart-items">
            <!-- Example cart item -->
            <div class="cart-item">
                <img src="../images/spaghetti.jpg" alt="Spaghetti" class="item-image">
                <div class="item-details">
                    <h3>Authentic Italian Spaghetti</h3>
                    <p>500g package</p>
                </div>
                <div class="quantity-controls">
                    <button class="quantity-btn">-</button>
                    <span class="quantity-display">2</span>
                    <button class="quantity-btn">+</button>
                </div>
                <span class="item-price">$4.99</span>
                <span class="item-total">$9.98</span>
                <button class="remove-btn">✕</button>
            </div>

            <!-- Another example item -->
            <div class="cart-item">
                <img src="../images/fettuccine.jpg" alt="Fettuccine" class="item-image">
                <div class="item-details">
                    <h3>Premium Fettuccine</h3>
                    <p>500g package</p>
                </div>
                <div class="quantity-controls">
                    <button class="quantity-btn">-</button>
                    <span class="quantity-display">1</span>
                    <button class="quantity-btn">+</button>
                </div>
                <span class="item-price">$5.99</span>
                <span class="item-total">$5.99</span>
                <button class="remove-btn">✕</button>
            </div>
        </div>

        <div class="cart-summary">
            <div class="summary-row">
                <span>Subtotal</span>
                <span>$15.97</span>
            </div>
            <div class="summary-row">
                <span>Shipping</span>
                <span>$4.99</span>
            </div>
            <div class="summary-row">
                <span>Tax</span>
                <span>$1.60</span>
            </div>
            <div class="summary-row total">
                <span>Total</span>
                <span>$22.56</span>
            </div>
            <button class="checkout-btn">Proceed to Checkout</button>
        </div>

        <!-- Empty cart state (hidden by default) -->
        <div class="empty-cart" style="display: none;">
            <h2>Your cart is empty</h2>
            <p>Looks like you haven't added any pasta to your cart yet!</p>
            <a href="products.php" class="continue-shopping">Continue Shopping</a>
        </div>
    </div>

    <?php include "Footer.php" ?>
</body>

</html>