<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Short Pasta Collection - Pasta Imposters</title>
    <link href="../css/style.css" rel="stylesheet">
    <style>
        /* Product Grid Styles */
        .product-header {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../images/Short_Noodles_Img.jpg');
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
                    <img src="../images/farfalle.jpg" alt="Farfalle Pasta">
                </div>
                <div class="product-info">
                    <h3>Farfalle</h3>
                    <p>Bow-tie shaped pasta perfect for creamy and tomato-based sauces.</p>
                    <div class="product-price">$5.99 / 500g</div>
                    <a href="product-details.php?id=101" class="product-btn">View Details</a>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="../images/rigatoni.jpg" alt="Rigatoni Pasta">
                </div>
                <div class="product-info">
                    <h3>Rigatoni</h3>
                    <p>Tube-shaped pasta with ridges ideal for thick, hearty sauces.</p>
                    <div class="product-price">$6.49 / 500g</div>
                    <a href="product-details.php?id=102" class="product-btn">View Details</a>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="../images/fusilli.jpg" alt="Fusilli Pasta">
                </div>
                <div class="product-info">
                    <h3>Fusilli</h3>
                    <p>Spiral-shaped pasta that captures pesto and chunky sauces beautifully.</p>
                    <div class="product-price">$5.79 / 500g</div>
                    <a href="product-details.php?id=103" class="product-btn">View Details</a>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="../images/penne.jpg" alt="Penne Pasta">
                </div>
                <div class="product-info">
                    <h3>Penne</h3>
                    <p>Tube-shaped pasta with angled ends, perfect for holding sauces inside.</p>
                    <div class="product-price">$5.49 / 500g</div>
                    <a href="product-details.php?id=104" class="product-btn">View Details</a>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="../images/orecchiette.jpg" alt="Orecchiette Pasta">
                </div>
                <div class="product-info">
                    <h3>Orecchiette</h3>
                    <p>Small, ear-shaped pasta that catches vegetables and chunky sauces.</p>
                    <div class="product-price">$7.29 / 500g</div>
                    <a href="product-details.php?id=105" class="product-btn">View Details</a>
                </div>
            </div>

            <div class="product-item">
                <div class="product-image">
                    <img src="../images/conchiglie.jpg" alt="Conchiglie Pasta">
                </div>
                <div class="product-info">
                    <h3>Conchiglie</h3>
                    <p>Shell-shaped pasta that traps sauces and small ingredients inside.</p>
                    <div class="product-price">$6.99 / 500g</div>
                    <a href="product-details.php?id=106" class="product-btn">View Details</a>
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