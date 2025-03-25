<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Short Pasta Collection - Pasta Imposters</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/smallPasta.css" rel="stylesheet">
    <style>

    </style>
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
                    <a href="product-details.php?id=101" class="product-btn">Add To Cart</a>
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
                    <a href="product-details.php?id=102" class="product-btn">Add To Cart</a>
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
                    <a href="product-details.php?id=103" class="product-btn">Add To Cart</a>
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