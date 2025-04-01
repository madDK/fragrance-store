<?php
session_start();
require 'db.php';

// Admin authentication check
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

// Validate product ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: admin.php?error=invalid_id");
    exit;
}

$product_id = (int)$_GET['id'];

try {
    // Get product image name first
    $stmt = $conn->prepare("SELECT image FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        header("Location: admin.php?error=not_found");
        exit;
    }

    $product = $result->fetch_assoc();
    
    // Delete from database
    $delete_stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $delete_stmt->bind_param("i", $product_id);
    
    if ($delete_stmt->execute()) {
        // Delete image file
        $image_path = __DIR__ . '/uploads/' . $product['image'];
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $_SESSION['success'] = "Product deleted";
    } else {
        $_SESSION['error'] = "Delete failed";
    }
} catch(Exception $e) {
    error_log("Delete Error: " . $e->getMessage());
    $_SESSION['error'] = "Delete error";
}

header("Location: admin.php");
exit;
?>