<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nama_database"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $customer_name = $_POST['nama'];
    $product_name = "Produk 1"; // Anda bisa ambil produk sesuai yang dipilih
    $quantity = $_POST['quantity'];
    $address = $_POST['alamat'];
    $payment_method = $_POST['payment_method'];
    $delivery_date = $_POST['delivery_date'];
    $delivery_time = $_POST['delivery_time'];

    // Simpan ke temporary_orders
    $sql = "INSERT INTO temporary_orders (customer_name, product_name, quantity, address, payment_method, delivery_date, delivery_time)
            VALUES ('$customer_name', '$product_name', $quantity, '$address', '$payment_method', '$delivery_date', '$delivery_time')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Pesanan Anda telah disimpan sementara.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Jika pengiriman selesai, pindahkan ke completed_orders
    // Misalnya berdasarkan pengaturan manual status pengiriman

    if (isset($_POST['order_complete'])) {
        $order_id = $_POST['order_id'];
        $sql_move = "INSERT INTO completed_orders (customer_name, product_name, quantity, address, payment_method, delivery_date, delivery_time)
                     SELECT customer_name, product_name, quantity, address, payment_method, delivery_date, delivery_time 
                     FROM temporary_orders WHERE id = $order_id";

        $conn->query($sql_move);
        $sql_delete = "DELETE FROM temporary_orders WHERE id = $order_id";
        $conn->query($sql_delete);

        echo "Pesanan telah dipindahkan ke completed_orders.";
    }
}

$conn->close();
?>
