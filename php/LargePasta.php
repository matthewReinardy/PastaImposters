<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Long Pasta Collection - Pasta Imposters</title>
    <link href="../css/style.css" rel="stylesheet">
    <style>
        /* Product Grid Styles */
        .product-header {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../images/Long_Noodles_Img.jpg');
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 80px;
            color: white;
            text-align: center;
            padding: 0 2rem;
        }

        .product-header h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .product-header p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .products-container {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 0 2rem;
        }

        .product-description {
            text-align: center;
            margin-bottom: 3rem;
        }

        .product-description h2 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .product-description p {
            color: #666;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .product-item {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .product-item:hover {
            transform: translateY(-10px);
        }

        .product-image {
            height: 250px;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .product-item:hover .product-image img {
            transform: scale(1.05);
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-info h3 {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .product-info p {
            color: #666;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .product-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #e67e22;
            margin-bottom: 1rem;
        }

        .product-btn {
            display: inline-block;
            background-color: #e67e22;
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .product-btn:hover {
            background-color: #d35400;
        }

        /* Features Section */
        .features {
            background-color: #f5f5f5;
            padding: 4rem 2rem;
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .features-heading {
            text-align: center;
            margin-bottom: 3rem;
        }

        .features-heading h2 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .feature-item {
            text-align: center;
            padding: 2rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: #e67e22;
            margin-bottom: 1rem;
        }

        .feature-item h3 {
            font-size: 1.4rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .feature-item p {
            color: #666;
            line-height: 1.5;
        }
    </style>
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
                    <img src="../images/spaghetti.jpg" alt="Spaghetti Pasta">
                </div>
                <div class="product-info">
                    <h3>Spaghetti</h3>
                    <p>The classic long, thin cylindrical pasta perfect for tomato-based and olive oil sauces.</p>
                    <div class="product-price">$4.99 / 500g</div>
                    <a href="product-details.php?id=201" class="product-btn">View Details</a>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="../images/fettuccine.jpg" alt="Fettuccine Pasta">
                </div>
                <div class="product-info">
                    <h3>Fettuccine</h3>
                    <p>Flat, thick noodles that pair perfectly with rich, creamy sauces like Alfredo.</p>
                    <div class="product-price">$6.49 / 500g</div>
                    <a href="product-details.php?id=202" class="product-btn">View Details</a>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="../images/linguine.jpg" alt="Linguine Pasta">
                </div>
                <div class="product-info">
                    <h3>Linguine</h3>
                    <p>Flat, narrow pasta between spaghetti and fettuccine, ideal for seafood dishes.</p>
                    <div class="product-price">$5.79 / 500g</div>
                    <a href="product-details.php?id=203" class="product-btn">View Details</a>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="../images/tagliatelle.jpg" alt="Tagliatelle Pasta">
                </div>
                <div class="product-info">
                    <h3>Tagliatelle</h3>
                    <p>Ribbon-shaped pasta that's slightly wider than fettuccine, perfect for robust meat sauces.</p>
                    <div class="product-price">$7.49 / 500g</div>
                    <a href="product-details.php?id=204" class="product-btn">View Details</a>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="../images/bucatini.jpg" alt="Bucatini Pasta">
                </div>
                <div class="product-info">
                    <h3>Bucatini</h3>
                    <p>Long, hollow pasta similar to thick spaghetti with a hole running through the center.</p>
                    <div class="product-price">$6.99 / 500g</div>
                    <a href="product-details.php?id=205" class="product-btn">View Details</a>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="../images/capellini.jpg" alt="Capellini Pasta">
                </div>
                <div class="product-info">
                    <h3>Capellini</h3>
                    <p>Very thin, delicate strands also known as "angel hair," perfect for light olive oil or seafood sauces.</p>
                    <div class="product-price">$5.99 / 500g</div>
                    <a href="product-details.php?id=206" class="product-btn">View Details</a>
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