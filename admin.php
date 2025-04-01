<?php 
session_start();
include 'includes/header.php';
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}
?>

<div class="container mt-5">
    <h2>Product Management</h2>
    
    <!-- Add Product Form -->
    <div class="card mb-4">
        <div class="card-header">Add New Product</div>
        <div class="card-body">
            <form action="add_product.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control" name="price" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="quantity" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <select class="form-select" name="type" required>
                        <option value="Men">Men</option>
                        <option value="Women">Women</option>
                        <option value="Unisex">Unisex</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>

    <!-- Product List -->
    <h3>Existing Products</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'db.php';
            $result = $conn->query("SELECT * FROM products");
            while($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td>$<?= $row['price'] ?></td>
                <td><?= $row['quantity'] ?></td>
                <td><?= $row['type'] ?></td>
                <td>
                    <a href="edit_product.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete_product.php?id=<?= $row['id'] ?>" 
       class="btn btn-sm btn-danger" 
       onclick="return confirm('Permanently delete <?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') ?>? This action cannot be undone!')"
       title="Delete Product">
       <i class="bi bi-trash"></i> Delete
    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>