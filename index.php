<?php include 'db.php'; ?>  <!-- Add this line to include the database connection -->
<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <div id="perfumeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <!-- First Carousel Item -->
            <div class="carousel-item active">
                <div class="hero-image" style="background-image: url('https://c1.wallpaperflare.com/preview/644/332/929/cosmetics-make-up-eye-shadow-brush.jpg')"></div>
                <div class="hero-content text-center text-white position-relative">
                    <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInDown">KS FRAGRANCE STORE</h1>
                    <p class="lead mb-4 animate__animated animate__fadeInUp">Explore a wide range of premium fragrances for every occasion.</p>
                    <a href="#products" class="btn btn-light btn-lg px-5 py-3 rounded-pill animate__animated animate__fadeInUp">Explore Now</a>
                </div>
            </div>

            <!-- Second Carousel Item -->
            <div class="carousel-item">
                <div class="hero-image" style="background-image: url('https://i.ibb.co/jYJDk21/store-img.png')"></div>
                <div class="hero-content text-center text-white position-relative">
                    <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInDown">Exclusive Perfume Collection</h1>
                    <p class="lead mb-4 animate__animated animate__fadeInUp">Find the perfect scent that suits your style and personality.</p>
                    <a href="#products" class="btn btn-light btn-lg px-5 py-3 rounded-pill animate__animated animate__fadeInUp">Shop Now</a>
                </div>
            </div>

            <!-- Third Carousel Item -->
            <div class="carousel-item">
                <div class="hero-image" style="background-image: url('https://i.ibb.co/Fk1hpKBP/ab7534d25804dce1ed23a0d0c0224d38.jpg')"></div>
                <div class="hero-content text-center text-white position-relative">
                    <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInDown">Exclusive Perfume Collection</h1>
                    <p class="lead mb-4 animate__animated animate__fadeInUp">Find the perfect scent that suits your style and personality.</p>
                    <a href="#products" class="btn btn-light btn-lg px-5 py-3 rounded-pill animate__animated animate__fadeInUp">Shop Now</a>
                </div>
            </div>
        </div>
        <!-- Add carousel controls if needed -->
        <button class="carousel-control-prev" type="button" data-bs-target="#perfumeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#perfumeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>



<!-- Featured Products -->
<section id="products" class="py-2 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col text-center">
                <h2 class="display-6 fw-bold mb-3">Featured Fragrances</h2>
                <p class="text-muted">Discover our signature scents</p>
            </div>
        </div>
        
        <div class="row g-4">
            <?php
            $featuredProducts = $conn->query("SELECT * FROM products LIMIT 4");
            while($product = $featuredProducts->fetch_assoc()):
            ?>
            <div class="col-md-6 col-lg-3">
                <div class="card product-card h-100 border-0 shadow-sm">
                    <div class="card-img-top">
                        <img src="uploads/<?= $product['image'] ?>" class="img-fluid" alt="<?= $product['name'] ?>">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name'] ?></h5>
                        <p class="card-text text-muted small"><?= substr($product['description'], 0, 60) ?>...</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 text-primary">Rs :<?= $product['price'] ?></span>
                            <a href="https://wa.me/1234567890" class="btn btn-sm btn-success">
                                <i class="bi bi-whatsapp"></i> Buy
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        
        <div class="text-center mt-5">
            <a href="products.php" class="btn btn-outline-dark btn-lg px-5 py-3 rounded-pill">
                View All Products <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>


<!-- Customer Reviews -->
<section class="reviews-section py-5 bg-white">
    <div class="container">
        <div class="row mb-5">
            <div class="col text-center">
                <h2 class="display-6 fw-bold mb-3">Customer Reviews</h2>
                <p class="text-muted">What our customers say</p>
            </div>
        </div>

        <div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
            <div class="carousel-inner">
                <!-- Review 1 -->
                <div class="carousel-item active">
                    <div class="box text-center">
                        <div class="img_container">
                            <div class="img-box">
                            <div class="img_box-inner">
                                    <img src="cus_reviews/vv.png" alt="Customer" class="rounded-circle mb-3">
                                </div>
                            </div>
                        </div>
                        <div class="detail-box">
                            <h5>Mr. Malith Kodagoda</h5>
                            <h6>⭐⭐⭐⭐⭐</h6>
                            <p>"Great Purchase Experience! Bought the Afnan 9PM fragrance from KS Fragrance, and I’m extremely happy with it! Fast delivery, easy website, and top-quality products. Highly recommend!"</p>
                        </div>
                    </div>
                </div>
                <!-- Review 2 -->
                    <div class="carousel-item">
                    <div class="box text-center">
                        <div class="img_container">
                            <div class="img-box">
                                <div class="img_box-inner">
                                    <img src="cus_reviews/client.jpg" alt="Customer" class="rounded-circle mb-3">
                                </div>
                            </div>
                        </div>
                        <div class="detail-box">
                            <h5>Mr. Dulaj</h5>
                            <h6>⭐⭐⭐⭐⭐</h6>
                            <p>"Club De Nuit is absolutely amazing! A luxurious, long-lasting fragrance at a great price. I’ve received so many compliments already. KS Fragrance, you’ve gained a loyal customer—thank you!"</p>
                        </div>
                    </div>
                </div>
                <!-- Review 4 -->
                <div class="carousel-item">
                    <div class="box text-center">
                        <div class="img_container">
                            <div class="img-box">
                                <div class="img_box-inner">
                                    <img src="cus_reviews/knknkn.jpg" alt="Customer" class="rounded-circle mb-3">
                                </div>
                            </div>
                        </div>
                        <div class="detail-box">
                            <h5>Mr. Dhanushka Bandara</h5>
                            <h6>⭐⭐⭐⭐⭐</h6>
                            <p>"Afnan 9PM is simply incredible! The scent is vibrant, long-lasting, and perfect for evening wear. It exceeded my expectations, and I couldn’t be happier with my purchase. Thank you, KS Fragrance, for such an outstanding product!"</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><</span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true">></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>



<!-- Floating WhatsApp Button -->
<div class="whatsapp-float">
    <a href="https://wa.me/1234567890" 
       class="btn btn-success btn-lg rounded-circle shadow-lg"
       target="_blank">
       <i class="bi bi-whatsapp"></i>
    </a>
</div>
 <!-- contact section -->

 <section class="contact_section layout_padding">
    <div class="container ">
      <h2 class="">
        Request A Call Back
        <a href="tel:0777168723" 
         style="display: inline-block; padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px; font-size: 16px;">
        Call Now
      </a>
      </h2>
   
    </div>
  
  </section>
 

<?php include 'includes/footer.php'; ?>



<style>

    /* customer review */
    .img-container {
        width: 100px;
        height: 100px;
        overflow: hidden;
        border-radius: 50%;
    }
    


    .box {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .img-box img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
    }

    .detail-box h5, .detail-box h6, .detail-box p {
        margin: 10px 0;
    }

    .carousel-control-prev-icon, .carousel-control-next-icon {
        font-size: 30px;
        color: #000;
    }
 /* customer review */

 .hero-section {
    position: relative;
    height: 100vh; /* Full viewport height */
}

.hero-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    filter: brightness(0.4); /* Darkens the image to make the text stand out */
}

.hero-content {
    position: relative;
    z-index: 1;
    top: 50%;
    transform: translateY(-50%);
}

.hero-content h1 {
    font-size: 4rem;
    font-weight: 700;
    letter-spacing: 1px;    
}

.hero-content .lead {
    font-size: 1.25rem;
    font-weight: 300;
}

.hero-content .btn {
    font-size: 1.1rem;
    padding: 10px 30px;
    border-radius: 50px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.hero-content .btn:hover {
    background-color:rgb(22, 113, 216);
    transform: scale(1.05);
}

.carousel-item {
    position: relative;
    height: 100vh;
}

.carousel-inner {
    position: relative;
    height: 100%;
}

.carousel-item img {
    height: 100%;
    object-fit: cover;
}

@media (max-width: 768px) {
    .hero-content h1 {
        font-size: 3rem;
    }
    .hero-content .lead {
        font-size: 1rem;
    }
    .hero-content .btn {
        font-size: 1rem;
        padding: 10px 25px;
    }
}

.product-card {
    transition: transform 0.3s;
    border-radius: 15px;
    overflow: hidden;
}

.product-card:hover {
    transform: translateY(-10px);
}

.product-card img {
    height: 300px;
    object-fit: cover;
    transition: transform 0.3s;
}

.review-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
}

.whatsapp-float {
    position: fixed;
    bottom: 10px;
    right: 10px;
    z-index: 1000;
}

.btn-success {
    background: #25D366 !important;
    padding: 10px;
    font-size: 1.0rem;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.animate__animated {
    animation-duration: 1s;
}



</style>

<script>
// Initialize carousels
document.addEventListener('DOMContentLoaded', function() {
    new bootstrap.Carousel(document.getElementById('perfumeCarousel'), {
        interval: 3000,
        wrap: true
    });
    
    new bootstrap.Carousel(document.getElementById('reviewCarousel'), {
        interval: 5000,
        wrap: true
    });
});

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>