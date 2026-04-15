<?php
session_start();
if (!isset($_SESSION['nama_user'])) {
    header("Location: login.php");
}
?>

<h1>Selamat Datang!</h1>
<p>Halo, kamu berhasil login sebagai Pelanggan.</p>
<a href="logout.php">Logout</a>