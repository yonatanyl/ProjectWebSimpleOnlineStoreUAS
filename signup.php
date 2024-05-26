<?php
    require 'connection.php';
    session_start();
    if(isset($_SESSION['email'])){
        header('location: products.php');
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
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <h1><b>Sign Up</b></h1>
                    <form method="post" action="user_registration_script.php" onsubmit="return validateForm()">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div> 
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password (minimum 6 characters)" required pattern=".{6,}">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required pattern=".{6,}">
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control" name="contact" placeholder="Contact" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="city" placeholder="City" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="address" placeholder="Address" required>
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Sign Up">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
        <footer class="footer mt-auto py-3 bg-dark">
            <div class="container">
                <center>
                    <p>&copy; <a href="https://instagram.com/yonatanyl">Yonatan Yusak Lestari, Arian, Risqi</a></p>
                </center>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
