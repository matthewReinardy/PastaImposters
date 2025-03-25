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
    <!-- Including the header file -->
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
                    <a href="product-details.php?id=201" class="product-btn">Add To Cart</a>
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
                    <a href="product-details.php?id=202" class="product-btn">Add To Cart</a>
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
                    <a href="product-details.php?id=203" class="product-btn">Add To Cart</a>
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