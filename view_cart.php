<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Carts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: inline-block;
            margin-right: 5px;
        }

        .navbar {
            background-color: #343a40;
            color: white;
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
            text-align: center;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">All Cart</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_product.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view_cart.php">All Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>View Carts</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Item Name</th>
                    <th>Status</th>
                    <th>Item Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
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

                // Jika request adalah POST, artinya ada request untuk menghapus cart
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $id = $_POST["id"];
                    // Query untuk menghapus cart berdasarkan id
                    $sql_delete = "DELETE FROM users_items WHERE id=$id";
                    if ($conn->query($sql_delete) === TRUE) {
                        echo "<div class='alert alert-success'>Cart deleted successfully</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Error deleting cart: " . $conn->error . "</div>";
                    }
                }

                // Query untuk mengambil semua data cart dengan informasi nama pengguna, nama item, harga item, dan status
                $sql = "SELECT u.name AS user_name, i.name AS item_name, i.price AS item_price, ui.status, ui.id FROM users_items ui 
        INNER JOIN users u ON ui.user_id = u.id 
        INNER JOIN items i ON ui.item_id = i.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["user_name"] . "</td>";
        echo "<td>" . $row["item_name"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>" . "Rp. " . $row["item_price"] . "</td>";
        echo "<td>";
        echo "<form method='post' onsubmit='return confirm(\"Are you sure you want to delete this cart?\")'>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "<button type='submit' class='btn btn-danger btn-sm'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No carts found.</td></tr>";
}


                ?>
            </tbody>
        </table>

        <?php
        // Tampilkan total uang yang didapat jika status sudah menjadi "confirmed"
        $sql_total = "SELECT SUM(i.price) AS total_price FROM users_items ui 
        INNER JOIN items i ON ui.item_id = i.id 
        WHERE ui.status = 'confirmed'";
$result_total = $conn->query($sql_total);

if ($result_total->num_rows > 0) {
    $row_total = $result_total->fetch_assoc();
    echo "<h3>Total Income (Confirmed Carts): Rp. " . $row_total["total_price"] . "</h3>";
} else {
    echo "<h3>Total Income (Confirmed Carts): Rp. 0</h3>";
}
$conn->close();
?>
    </div>
    
</body>

</html>
