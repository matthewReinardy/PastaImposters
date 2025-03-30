<?php
// Start session
session_start();

// Check if order was completed
if (!isset($_SESSION['order_complete']) || $_SESSION['order_complete'] !== true) {
    // Redirect to cart page if order wasn't completed
    header('Location: Cart.php');
    exit();
}

// Clear the order complete flag
$_SESSION['order_complete'] = false;

// Generate a random order number
$orderNumber = 'PI-' . date('Ymd') . '-' . rand(1000, 9999);
$estimatedDelivery = date('F j, Y', strtotime('+3 days'));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Pasta Imposters</title>
    <link href="../css/style.css" rel="stylesheet">
    <style>
        .confirmation-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            text-align: center;
            font-family: Arial, sans-serif;
            margin-top: 200px;
        }

        .confirmation-header {
            margin-bottom: 30px;
        }

        .confirmation-header h1 {
            color: #2ecc71;
            margin-bottom: 10px;
        }

        .order-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
            text-align: left;
        }

        .detail-row {
            margin-bottom: 15px;
        }

        .detail-row strong {
            display: inline-block;
            width: 180px;
        }

        .continue-shopping {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }

        .continue-shopping:hover {
            background-color: #2980b9;
        }

        .checkmark {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #2ecc71;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
            position: relative;
            margin: 0 auto 30px auto;
            background-color: #2ecc71;
            padding: 20px;
        }

        .checkmark-circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #fff;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .checkmark-check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: none;
            }

            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #2ecc71;
            }
        }
    </style>
</head>

<body>
    <?php include "Header.php" ?>

    <div class="confirmation-container">
        <div class="confirmation-header">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none" />
                <path class="checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
            </svg>
            <h1>Order Confirmed!</h1>
            <p>Thank you for your purchase. Your pasta is on its way!</p>
        </div>

        <div class="order-details">
            <h2>Order Details</h2>

            <div class="detail-row">
                <strong>Order Number:</strong> <?php echo $orderNumber; ?>
            </div>

            <div class="detail-row">
                <strong>Order Date:</strong> <?php echo date('F j, Y'); ?>
            </div>

            <div class="detail-row">
                <strong>Estimated Delivery:</strong> <?php echo $estimatedDelivery; ?>
            </div>

            <div class="detail-row">
                <strong>Shipping Method:</strong> Standard Shipping
            </div>

            <div class="detail-row">
                <strong>Payment Method:</strong> Credit Card (ending in ****)
            </div>
        </div>

        <p>A confirmation email has been sent to your email address.</p>
        <p>If you have any questions about your order, please contact our customer service team.</p>

        <a href="LargePasta.php" class="continue-shopping">Continue Shopping</a>
    </div>

    <?php include "Footer.php" ?>
</body>

</html>