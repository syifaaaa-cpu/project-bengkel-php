<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        if ($user['role'] == 'admin') { header("Location: dashboard_admin.php"); } 
        else { header("Location: dashboard_user.php"); }
    } else {
        $error = "Email atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Bengkel</title>
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-container { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); width: 350px; text-align: center; }
        h2 { color: #333; font-size: 28px; margin-bottom: 30px; }
        .input-group { margin-bottom: 20px; text-align: left; }
        label { display: block; margin-bottom: 5px; color: #666; font-size: 14px; }
        input { width: 100%; padding: 12px; border: 2px solid #eee; border-radius: 10px; box-sizing: border-box; transition: 0.3s; }
        input:focus { border-color: #764ba2; outline: none; }
        .btn-login { background: #764ba2; color: white; border: none; width: 100%; padding: 12px; border-radius: 10px; font-size: 16px; font-weight: bold; cursor: pointer; transition: 0.3s; margin-top: 10px; }
        .btn-login:hover { background: #5a377d; transform: translateY(-2px); }
        .register-link { margin-top: 25px; font-size: 14px; color: #777; }
        .register-link a { color: #764ba2; text-decoration: none; font-weight: bold; }
        .error-msg { background: #ffebee; color: #c62828; padding: 10px; border-radius: 8px; font-size: 13px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Welcome Back</h2>
        <?php if(isset($error)) echo "<div class='error-msg'>$error</div>"; ?>
        <form method="POST">
            <div class="input-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit" name="login" class="btn-login">LOGIN</button>
        </form>
        <div class="register-link">
            Belum punya akun? <a href="register.php">Daftar Sekarang</a>
        </div>
    </div>
</body>
</html>