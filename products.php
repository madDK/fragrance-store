<?php include 'includes/header.php'; ?>
<div class="container mt-5">
    <h2 class="mb-4 text-center display-4">Our Perfumes</h2>
    <div class="row g-4">
        <?php
        include 'db.php';

        // Pagination Logiccs
        $limit = 8;  // Max 8 products per page
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $total_result = $conn->query("SELECT COUNT(id) AS total FROM products");
        $total_row = $total_result->fetch_assoc();
        $total_products = $total_row['total'];
        $total_pages = ceil($total_products / $limit);

        $result = $conn->query("SELECT * FROM products LIMIT $start, $limit");

        while ($row = $result->fetch_assoc()):
        ?>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-img-top-container d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1; overflow: hidden;">
                    <img src="uploads/<?= $row['image'] ?>" class="img-fluid w-100" style="height: auto; object-fit: cover;" alt="<?= htmlspecialchars($row['name']) ?>">
                </div>
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title fw-bold mb-0 text-truncate" style="max-width: 70%;" title="<?= htmlspecialchars($row['name']) ?>">
                            <?= htmlspecialchars($row['name']) ?>
                        </h5>
                        <span class="badge rounded-pill bg-primary text-nowrap"> <?= htmlspecialchars($row['type']) ?> </span>
                    </div>
                    <p class="card-text text-muted small mb-3 flex-grow-1 text-truncate" title="<?= htmlspecialchars($row['description']) ?>">
                        <?= htmlspecialchars(substr($row['description'], 0, 80)) ?>...
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-primary mb-0">Rs.<?= number_format($row['price'], 2) ?></h5>
                        <a href="https://wa.me/94779405131?text=<?= urlencode("I'm interested in buying {$row['name']} (Price: {$row['price']})") ?>" 
                           class="btn btn-success btn-sm text-nowrap" 
                           target="_blank">
                            <i class="bi bi-whatsapp"></i> Buy Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center mt-4">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
<?php include 'includes/footer.php'; ?>