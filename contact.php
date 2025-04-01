<?php include 'includes/header.php'; ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Contact Us</h2>
            <form action="submit_contact.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
        <div class="col-md-6">
            <h2>Store Information</h2>
            <p>KS Fragrance<br>1st avenue ,ampara</p>
            <p>Phone: 0777 168723/p>
            <p>Email: ksfragrance@gmail.com</p>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>