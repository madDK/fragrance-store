<?php
session_start();
include 'db.php';

// Authentication check
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

// Initialize variables
$error = '';
$success = '';
$product = [];

// Get product data
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    
    if (!$product) {
        header("Location: admin.php");
        exit;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $price = (float)$_POST['price'];
    $description = trim($_POST['description']);
    $quantity = (int)$_POST['quantity'];
    $type = $_POST['type'];
    
    // Basic validation
    if (empty($name) || $price <= 0 || $quantity < 0) {
        $error = "Please fill all required fields correctly";
    } else {
        // Handle image upload
        $image = $product['image']; // Keep existing image by default
        
        if (!empty($_FILES['image']['name'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            
            // Validate image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check === false) {
                $error = "File is not an image";
            } elseif ($_FILES["image"]["size"] > 500000) {
                $error = "Image is too large (max 500KB)";
            } elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                $error = "Only JPG, JPEG, PNG & GIF files are allowed";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image = $_FILES["image"]["name"];
                } else {
                    $error = "Error uploading image";
                }
            }
        }

        if (empty($error)) {
            // Update database
            $stmt = $conn->prepare("UPDATE products SET 
                name = ?, 
                price = ?, 
                description = ?, 
                image = ?, 
                quantity = ?, 
                type = ?
                WHERE id = ?");
                
            $stmt->bind_param("sdssisi", 
                $name,
                $price,
                $description,
                $image,
                $quantity,
                $type,
                $id
            );

            if ($stmt->execute()) {
                $success = "Product updated successfully";
                // Refresh product data
                $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $product = $result->fetch_assoc();
            } else {
                $error = "Error updating product: " . $conn->error;
            }
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Edit Product</h3>
                </div>
                <div class="card-body">
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?= $success ?></div>
                    <?php endif; ?>

                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                        
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="name" 
                                   value="<?= htmlspecialchars($product['name']) ?>" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" step="0.01" class="form-control" name="price" 
                                       value="<?= $product['price'] ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="quantity" 
                                       value="<?= $product['quantity'] ?>" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="4" required><?= htmlspecialchars($product['description']) ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Current Image</label>
                            <div>
                                <img src="uploads/<?= $product['image'] ?>" 
                                     class="img-thumbnail" 
                                     style="max-height: 150px"
                                     alt="Current product image">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Image (optional)</label>
                            <input type="file" class="form-control" name="image" 
                                   accept="image/jpeg, image/png, image/gif">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Type</label>
                            <select class="form-select" name="type" required>
                                <option value="Men" <?= $product['type'] == 'Men' ? 'selected' : '' ?>>Men</option>
                                <option value="Women" <?= $product['type'] == 'Women' ? 'selected' : '' ?>>Women</option>
                                <option value="Unisex" <?= $product['type'] == 'Unisex' ? 'selected' : '' ?>>Unisex</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-save"></i> Update Product
                            </button>
                            <a href="admin.php" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Back to Admin
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>