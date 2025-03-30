<?php
// Include necessary files
require_once 'Product.php';
require_once 'ProductCatalog.php';
require_once 'Cart.php';

// Start session and check if cart exists
session_start();
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    // Redirect to cart page if cart is empty
    header('Location: Cart.php');
    exit();
}

// Calculate totals
$subtotal = 0;
$tax_rate = 0.08;
$shipping_cost = 4.99;

foreach ($_SESSION['cart'] as $item) {
    $subtotal += $item['product']->price * $item['quantity'];
}

$tax = $subtotal * $tax_rate;
$total = $subtotal + $tax + $shipping_cost;

// Handle form submission
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form inputs
    if (empty($_POST['first_name'])) {
        $errors['first_name'] = 'First name is required';
    }

    if (empty($_POST['last_name'])) {
        $errors['last_name'] = 'Last name is required';
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Valid email is required';
    }

    if (empty($_POST['address'])) {
        $errors['address'] = 'Address is required';
    }

    if (empty($_POST['city'])) {
        $errors['city'] = 'City is required';
    }

    if (empty($_POST['postal_code'])) {
        $errors['postal_code'] = 'Postal code is required';
    }

    if (empty($_POST['card_number']) || !preg_match('/^\d{16}$/', str_replace(' ', '', $_POST['card_number']))) {
        $errors['card_number'] = 'Valid card number is required (16 digits)';
    }

    if (empty($_POST['card_expiry']) || !preg_match('/^\d{2}\/\d{2}$/', $_POST['card_expiry'])) {
        $errors['card_expiry'] = 'Valid expiration date required (MM/YY)';
    }

    if (empty($_POST['card_cvv']) || !preg_match('/^\d{3,4}$/', $_POST['card_cvv'])) {
        $errors['card_cvv'] = 'Valid CVV required (3-4 digits)';
    }

    // If no errors, process the order
    if (empty($errors)) {
        // In a real app, you would process payment and store order here

        // Clear the cart after successful checkout
        $_SESSION['cart'] = [];
        $_SESSION['order_complete'] = true;

        // Redirect to order confirmation page
        header('Location: OrderConfirmation.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Pasta Imposters</title>
    <link href="../css/style.css" rel="stylesheet">
    <style>
        .checkout-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .checkout-title {
            margin-bottom: 30px;
            text-align: center;
        }

        .checkout-form {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .form-section {
            flex: 1;
            min-width: 300px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
        }

        .order-summary {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .summary-row.total {
            font-weight: bold;
            font-size: 1.2em;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 10px;
        }

        .place-order-btn {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 15px 30px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
            width: 100%;
        }

        .place-order-btn:hover {
            background-color: #27ae60;
        }

        .order-items {
            margin-bottom: 20px;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .item-details {
            flex-grow: 1;
        }
    </style>
</head>

<body>
    <?php include "Header.php" ?>

    <div class="checkout-container">
        <div class="checkout-title">
            <h1>Checkout</h1>
            <p>Please complete your order details</p>
        </div>

        <div class="order-summary">
            <h2>Order Summary</h2>
            <div class="order-items">
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <div class="order-item">
                        <div class="item-details">
                            <h3><?php echo $item['product']->name; ?></h3>
                            <p>Quantity: <?php echo $item['quantity']; ?></p>
                        </div>
                        <div class="item-price">
                            $<?php echo number_format($item['product']->price * $item['quantity'], 2); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="summary-row">
                <span>Subtotal</span>
                <span>$<?php echo number_format($subtotal, 2); ?></span>
            </div>
            <div class="summary-row">
                <span>Shipping</span>
                <span>$<?php echo number_format($shipping_cost, 2); ?></span>
            </div>
            <div class="summary-row">
                <span>Tax (<?php echo $tax_rate * 100; ?>%)</span>
                <span>$<?php echo number_format($tax, 2); ?></span>
            </div>
            <div class="summary-row total">
                <span>Total</span>
                <span>$<?php echo number_format($total, 2); ?></span>
            </div>
        </div>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="checkout-form">
                <div class="form-section">
                    <h2>Shipping Information</h2>

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="<?php echo isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : ''; ?>">
                        <?php if (isset($errors['first_name'])): ?>
                            <p class="error-message"><?php echo $errors['first_name']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="<?php echo isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : ''; ?>">
                        <?php if (isset($errors['last_name'])): ?>
                            <p class="error-message"><?php echo $errors['last_name']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        <?php if (isset($errors['email'])): ?>
                            <p class="error-message"><?php echo $errors['email']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>">
                        <?php if (isset($errors['address'])): ?>
                            <p class="error-message"><?php echo $errors['address']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="<?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city']) : ''; ?>">
                        <?php if (isset($errors['city'])): ?>
                            <p class="error-message"><?php echo $errors['city']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="state">State/Province</label>
                        <input type="text" id="state" name="state" value="<?php echo isset($_POST['state']) ? htmlspecialchars($_POST['state']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" id="postal_code" name="postal_code" value="<?php echo isset($_POST['postal_code']) ? htmlspecialchars($_POST['postal_code']) : ''; ?>">
                        <?php if (isset($errors['postal_code'])): ?>
                            <p class="error-message"><?php echo $errors['postal_code']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Payment Information</h2>

                    <div class="form-group">
                        <label for="card_name">Name on Card</label>
                        <input type="text" id="card_name" name="card_name" value="<?php echo isset($_POST['card_name']) ? htmlspecialchars($_POST['card_name']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="card_number">Card Number</label>
                        <input type="text" id="card_number" name="card_number" placeholder="1234 5678 9012 3456" value="<?php echo isset($_POST['card_number']) ? htmlspecialchars($_POST['card_number']) : ''; ?>">
                        <?php if (isset($errors['card_number'])): ?>
                            <p class="error-message"><?php echo $errors['card_number']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="card_expiry">Expiration Date</label>
                        <input type="text" id="card_expiry" name="card_expiry" placeholder="MM/YY" value="<?php echo isset($_POST['card_expiry']) ? htmlspecialchars($_POST['card_expiry']) : ''; ?>">
                        <?php if (isset($errors['card_expiry'])): ?>
                            <p class="error-message"><?php echo $errors['card_expiry']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="card_cvv">CVV</label>
                        <input type="text" id="card_cvv" name="card_cvv" placeholder="123" value="<?php echo isset($_POST['card_cvv']) ? htmlspecialchars($_POST['card_cvv']) : ''; ?>">
                        <?php if (isset($errors['card_cvv'])): ?>
                            <p class="error-message"><?php echo $errors['card_cvv']; ?></p>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="place-order-btn">Place Order</button>
                </div>
            </div>
        </form>
    </div>

    <?php include "Footer.php" ?>
</body>

</html>