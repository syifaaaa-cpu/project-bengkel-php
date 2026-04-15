<?php
include 'koneksi.php';
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat = $_POST['repeat_password'];

    if ($password === $repeat) {
        $pw_hash = password_hash($password, PASSWORD_DEFAULT);
        $role = 'pelanggan';
        $query = "INSERT INTO users (email, password, role) VALUES ('$email', '$pw_hash', '$role')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Akun berhasil dibuat!'); window.location='login.php';</script>";
        }
    } else { $error = "Password tidak sama!"; }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Akun</title>
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .reg-container { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); width: 380px; text-align: center; }
        h2 { color: #333; font-size: 28px; margin-bottom: 25px; }
        input { width: 100%; padding: 12px; margin-bottom: 15px; border: 2px solid #eee; border-radius: 10px; box-sizing: border-box; }
        .btn-reg { background: #28a745; color: white; border: none; width: 100%; padding: 12px; border-radius: 10px; font-size: 16px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .btn-reg:hover { background: #218838; transform: translateY(-2px); }
        .back-login { margin-top: 20px; font-size: 14px; }
        .back-login a { color: #764ba2; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="reg-container">
        <h2>Buat Akun</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="Email Baru" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="repeat_password" placeholder="Ulangi Password" required>
            <button type="submit" name="register" class="btn-reg">DAFTAR SEKARANG</button>
        </form>
        <div class="back-login">
            Sudah ada akun? <a href="login.php">Masuk di sini</a>
        </div>
    </div>
</body>
</html>