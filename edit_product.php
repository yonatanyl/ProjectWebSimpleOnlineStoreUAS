<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tangani form edit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $image = $_POST["image"]; // Image filename input

    // Update produk di database
    $sql = "UPDATE items SET name='$name', price=$price, image_filename='$image' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully";
        header("Location: admin_dashboard.php"); // Redirect to admin_dashboard.php
        exit(); // Stop further execution
    } else {
        echo "Error updating product: " . $conn->error;
    }
}

// Ambil data produk berdasarkan id dari parameter URL
$id = $_GET["id"];
$sql = "SELECT * FROM items WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Product</h2>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row["name"]; ?>">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $row["price"]; ?>">
            </div>
            <div class="form-group">
                <label for="image">Image Filename:</label>
                <input type="text" class="form-control" id="image" name="image" value="<?php echo $row["image_filename"]; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>

<?php
$conn->close();
?>
