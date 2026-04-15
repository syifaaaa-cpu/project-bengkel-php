<?php
session_start();
// Proteksi: Kalau bukan admin, balikkan ke login
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<h1>Halaman ADMIN</h1>
<p>Selamat Datang,Admin! (<?php echo $_SESSION['email']; ?>)</p>
<p>Menu: Kelola Stok, Kelola Mekanik, Laporan Transaksi.</p>
<a href="logout.php">Logout</a>