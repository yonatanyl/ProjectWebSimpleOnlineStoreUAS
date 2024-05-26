<?php
    session_start();
    require 'check_if_added.php';
    require 'connection.php'; // File koneksi ke database

    // Query untuk mengambil data produk dari database
    $query = "SELECT * FROM items";
    $result = mysqli_query($con, $query);

    // Cek apakah query berhasil dijalankan
    if (!$result) {
        die('Query Error: ' . mysqli_error($con));
    }
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
        <div class="container mt-5">
            <div class="jumbotron">
                <h1 class="display-4">Welcome to our Yoriba Store!</h1>
                <p class="lead">We have the best cameras, watches, and shirts for you. No need to hunt around, we have all in one place.</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                // Loop melalui hasil query dan tampilkan setiap produk
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card">
                            <img src="img/<?php echo $row['image_filename']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <p class="card-text">Price: Rp. <?php echo number_format($row['price']); ?></p>
                                <?php if (!isset($_SESSION['email'])) { ?>
                                    <a href="login.php" class="btn btn-primary">Buy Now</a>
                                <?php } else {
                                    if (check_if_added_to_cart($row['id'])) {
                                        echo '<a href="#" class="btn btn-success disabled">Added to cart</a>';
                                    } else { ?>
                                        <a href="cart_add.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Add to cart</a>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                // Bebaskan hasil query
                mysqli_free_result($result);
                // Tutup koneksi database
                mysqli_close($con);
                ?>
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
