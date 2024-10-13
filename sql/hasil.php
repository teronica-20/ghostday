<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tugas"; // Ganti dengan nama database Anda

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

    $stmt = $conn->prepare("INSERT INTO temporary_orders (customer_name, product_name, quantity, address, payment_method, delivery_date, delivery_time)
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssissss", $customer_name, $product_name, $quantity, $address, $payment_method, $delivery_date, $delivery_time);
$stmt->execute();

    if ($conn->query($sql) === TRUE) {
        echo "Pesanan Anda telah disimpan sementara.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Jika pengiriman selesai, pindahkan ke completed_orders
    // Misalnya berdasarkan pengaturan manual status pengiriman

    if (isset($_POST['order_complete'])) {
        $order_id = $_POST['order_id'];
    
        // Pindahkan data ke completed_orders
        $stmt_move = $conn->prepare("INSERT INTO completed_orders (customer_name, product_name, quantity, address, payment_method, delivery_date, delivery_time)
                                     SELECT customer_name, product_name, quantity, address, payment_method, delivery_date, delivery_time 
                                     FROM temporary_orders WHERE id = ?");
        $stmt_move->bind_param("i", $order_id);
        $stmt_move->execute();
    
        // Hapus dari temporary_orders
        $stmt_delete = $conn->prepare("DELETE FROM temporary_orders WHERE id = ?");
        $stmt_delete->bind_param("i", $order_id);
        $stmt_delete->execute();
    
        echo "Pesanan telah dipindahkan ke completed_orders.";
    }    
}

$conn->close();
?>
