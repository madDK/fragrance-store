

<?php include 'includes/header.php'; 
$site_title = "KS Fragrance";
$about_text = "At KS Fragrance, we bring you the finest scents that elevate your personality. Our collection features 100% authentic perfumes sourced from trusted brands worldwide, ensuring unparalleled quality and satisfaction.";
$contact_info = [
  "address" => "Avenue Road, Ampara, Sri Lanka",
  "phone" => "+94777168723",
  "email" => "ks@gmail.com"
];
$carousel_images = [
  "images/emporio-armani-because-its-you.jpg",
  "images/bentley_for_men.jpg",
  "images/flower-bomb.jpg"
];
$menu_links = [
  "Home" => "index.php",
  "About" => "about.php",
  "Products" => "product.php",
  "Blog" => "blog.php",
  "Contact" => "contact.php"
];
$social_links = [
  "Facebook" => "#",
  "Instagram" => "#",
  "YouTube" => "#"
];
?>

<!-- About Section -->
<section class="about_section layout_padding">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="detail-box" data-aos="fade-right">
          <div class="heading_container">
            <h2>About Our Products</h2>
          </div>
          <p><?= $about_text; ?></p>
          <a href="http://www.facebook.com/Kaushalya" class="btn btn-primary mt-3">Read More</a>
        </div>
      </div>
      <div class="col-md-6">
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel" data-aos="fade-left">
          <div class="carousel-inner">
            <?php foreach ($carousel_images as $index => $image): ?>
              <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                <img src="<?= $image; ?>" class="d-block w-100" alt="">
              </div>
            <?php endforeach; ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>



<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init({duration: 1000});
</script>
