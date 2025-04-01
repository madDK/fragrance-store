<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfume Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        /* Custom Navbar Styles */
        .navbar {
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.8rem;
            color: #333;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link {
            font-size: 1rem;
            margin-left: 1rem;
            color: #555;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #f79c42;
            text-decoration: none;
        }

        .navbar-toggler-icon {
            background-color: #333;
        }

        /* Animations */
        .animate__animated {
            animation-duration: 1s;
        }

        .animate__fadeInDown {
            animation-name: fadeInDown;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile-Friendly Styles */
        @media (max-width: 767px) {
            .navbar-brand {
                font-size: 1.6rem;
            }

            .navbar-nav .nav-link {
                font-size: 0.9rem;
                margin-left: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
        <a class="navbar-brand animate__animated animate__fadeInDown" href="index.php">
  <img src="cus_reviews/Capture.PNG" alt="KS Fragrance" height="50">
</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link animate__animated animate__fadeInDown" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link animate__animated animate__fadeInDown" href="products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link animate__animated animate__fadeInDown" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link animate__animated animate__fadeInDown" href="contact.php">Contact</a></li>
                    <?php if(isset($_SESSION['admin_logged_in'])): ?>
                        <li class="nav-item"><a class="nav-link animate__animated animate__fadeInDown" href="admin.php">Admin</a></li>
                        <li class="nav-item"><a class="nav-link animate__animated animate__fadeInDown" href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link animate__animated animate__fadeInDown" href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Add Bootstrap JS at the end of your body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
