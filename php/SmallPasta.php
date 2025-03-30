<!-- Short Pasta Page (Short Pasta Collection) -->
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


// Handle Add to Cart functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $productId = intval($_POST['product_id']);
    $productCatalog = new ProductCatalog();
    $product = $productCatalog->getProductById($productId);

    if ($product) {
        // Check if product already in cart
        $productExists = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['product']->id == $productId) {
                $item['quantity']++;
                $productExists = true;
                break;
            }
        }

        // If product not in cart, add it
        if (!$productExists) {
            $_SESSION['cart'][] = [
                'product' => $product,
                'quantity' => 1
            ];
        }

        // Redirect to prevent form resubmission
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Short Pasta Collection - Pasta Imposters</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/smallPasta.css" rel="stylesheet">
</head>

<body>
    <?php include "Header.php" ?>

    <!-- Product Header Banner -->
    <div class="product-header">
        <div>
            <h1>Short Pasta Collection</h1>
            <p>Discover our artisanal selection of short pasta shapes, perfect for holding rich sauces and creating memorable meals</p>
        </div>
    </div>

    <!-- Products Section -->
    <section class="products-container">
        <div class="product-description">
            <h2>Explore Our Short Pasta Varieties</h2>
            <p>Our short pasta collection features carefully crafted shapes that capture the essence of traditional Italian pasta-making. Each shape is designed to pair perfectly with specific sauces, enhancing your culinary creations with authentic texture and flavor.</p>
        </div>

        <div class="product-grid">
            <div class="product-item">
                <div class="product-image">
                    <img src="../images/Farfalle_Image.jpg" alt="Farfalle Pasta">
                </div>
                <div class="product-info">
                    <h3>Farfalle</h3>
                    <p>Bow-tie shaped pasta perfect for creamy and tomato-based sauces.</p>
                    <div class="product-price">$5.99 / 500g</div>
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="101">
                        <button type="submit" name="add_to_cart" class="product-btn">Add To Cart</button>
                    </form>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="../images/Rigatoni_Image.jpg" alt="Rigatoni Pasta">
                </div>
                <div class="product-info">
                    <h3>Rigatoni</h3>
                    <p>Tube-shaped pasta with ridges ideal for thick, hearty sauces.</p>
                    <div class="product-price">$6.49 / 500g</div>
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="102">
                        <button type="submit" name="add_to_cart" class="product-btn">Add To Cart</button>
                    </form>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="../images/Shells_Image.jpg" alt="Fusilli Pasta">
                </div>
                <div class="product-info">
                    <h3>Shells</h3>
                    <p>Spiral-shaped pasta that captures pesto and chunky sauces beautifully.</p>
                    <div class="product-price">$5.79 / 500g</div>
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="103">
                        <button type="submit" name="add_to_cart" class="product-btn">Add To Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="features-container">
            <div class="features-heading">
                <h2>Why Choose Our Short Pasta</h2>
            </div>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">🌾</div>
                    <h3>Premium Ingredients</h3>
                    <p>Made from 100% durum wheat semolina for authentic texture and flavor that holds up to any sauce.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🇮🇹</div>
                    <h3>Traditional Methods</h3>
                    <p>Crafted using traditional Italian techniques that have been perfected over generations.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🍽️</div>
                    <h3>Versatile Shapes</h3>
                    <p>Each shape is designed to pair perfectly with specific sauces for the ultimate pasta experience.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include "Footer.php" ?>
</body>

</html>