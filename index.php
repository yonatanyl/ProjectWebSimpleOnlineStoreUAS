<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
    <title>Yoriba Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <div>
        <?php
        require 'header.php';
        ?>
        <div id="bannerImage" class="text-center">
    <div class="container">
        <div id="bannerContent" class="py-5 d-flex justify-content-center align-items-center" style="margin-left: 240px;">
            <div>
                <h1>We Are Selling</h1>
                <p>Flat 40% OFF on all premium brands.</p>
                <a href="products.php" class="btn btn-danger">Shop Now</a>
            </div>
        </div>
    </div>
</div>


        <div class="container">
            <div class="row my-5">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="products.php">
                            <img src="img/camera.jpg" class="card-img-top" alt="Camera">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Cameras</h5>
                            <p class="card-text">Choose the best available in the world.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="products.php">
                            <img src="img/watch.jpg" class="card-img-top" alt="Watch">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Watches</h5>
                            <p class="card-text">Original watches from the best brands.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="products.php">
                            <img src="img/shirt.jpg" class="card-img-top" alt="Shirt">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Shirts</h5>
                            <p class="card-text">Our exquisite collection of shirts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer py-0 bg-dark">
            <div class="container">
                <p class="text-center mb-0">&copy; <a href="https://instagram.com/yonatanyl">Yonatan Yusak Lestari, Arian, Risqi</a></p>
            </div>
        </footer>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
