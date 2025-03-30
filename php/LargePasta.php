<!-- Long Pasta Page (Long Pasta Collection) -->
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
    <title>Long Pasta Collection - Pasta Imposters</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/largePasta.css" rel="stylesheet">
</head>

<body>
    <?php include "Header.php" ?>

    <!-- Product Header Banner -->
    <div class="product-header">
        <div>
            <h1>Long Pasta Collection</h1>
            <p>Discover our artisanal selection of long pasta varieties, crafted to bring authentic Italian taste to your table</p>
        </div>
    </div>

    <!-- Products Section -->
    <section class="products-container">
        <div class="product-description">
            <h2>Explore Our Long Pasta Varieties</h2>
            <p>Our long pasta collection features expertly crafted strands that embody the essence of traditional Italian cuisine. Each variety offers unique texture and cooking properties, perfect for twirling with your favorite sauces and creating classic dishes.</p>
        </div>

        <div class="product-grid">
            <div class="product-item">
                <div class="product-image">
                    <img src="../images/Spaghetti_Image.jpg" alt="Spaghetti Pasta">
                </div>
                <div class="product-info">
                    <h3>Spaghetti</h3>
                    <p>The classic long, thin cylindrical pasta perfect for tomato and olive oil sauces.</p>
                    <div class="product-price">$4.99 / 500g</div>
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="201">
                        <button type="submit" name="add_to_cart" class="product-btn">Add To Cart</button>
                    </form>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="../images/Fettucine_Image.jpg" alt="Fettuccine Pasta">
                </div>
                <div class="product-info">
                    <h3>Fettuccine</h3>
                    <p>Flat, thick noodles that pair perfectly with rich, creamy sauces like Alfredo.</p>
                    <div class="product-price">$6.49 / 500g</div>
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="202">
                        <button type="submit" name="add_to_cart" class="product-btn">Add To Cart</button>
                    </form>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="../images/Linguine.jpeg" alt="Linguine Pasta">
                </div>
                <div class="product-info">
                    <h3>Linguine</h3>
                    <p>Flat, narrow pasta between spaghetti and fettuccine, ideal for seafood dishes.</p>
                    <div class="product-price">$5.79 / 500g</div>
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="203">
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
                <h2>Why Choose Our Long Pasta</h2>
            </div>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">✨</div>
                    <h3>Perfect Texture</h3>
                    <p>Our slow-drying process creates pasta with the ideal balance of smoothness and roughness for sauce adhesion.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">⏱️</div>
                    <h3>Optimal Cooking Time</h3>
                    <p>Engineered to reach the perfect al dente texture within the recommended cooking time, every time.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🌿</div>
                    <h3>All-Natural</h3>
                    <p>Made with just durum wheat semolina and water—no additives, preservatives, or artificial ingredients.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include "Footer.php" ?>
</body>

</html>