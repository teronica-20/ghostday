<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tugas"; // Sesuaikan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $customer_name = $_POST['nama'];
    $product_name = "Produk 1"; // Produk tetap atau bisa diubah dinamis
    $quantity = $_POST['quantity'];
    $address = $_POST['alamat'];
    $payment_method = $_POST['payment_method'];
    $delivery_time = $_POST['delivery_time'];

    // Simpan ke temporary_orders
    $stmt = $conn->prepare("INSERT INTO temporary_orders (customer_name, product_name, quantity, address, payment_method, delivery_time) 
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $customer_name, $product_name, $quantity, $address, $payment_method, $delivery_time);
    $stmt->execute();

    // Notifikasi dan redirect setelah pembayaran selesai
    if ($payment_method) {
        echo "<script>
                alert('Pembayaran Anda berhasil, pesanan akan diantarkan.');
                setTimeout(function() {
                    window.location.href = '../menu%20utama/beranda.html';
                }, 3000); // Redirect ke beranda.html setelah 3 detik
              </script>";
    }
}
$conn->close();
?>
