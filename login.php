<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === 'admin' && $password === '123456') {
        $_SESSION['loggedin'] = true;
        $_SESSION['nama_admin'] = 'Muhamad Fatio Sodirin';
        
        header("Location: admin.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: Arial; background: #f4f4f4; display:flex; justify-content:center; align-items:center; height:100vh; margin:0; }
        .login-box { background:white; padding:30px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1); width:320px; }
        input { width:100%; padding:10px; margin:8px 0; border:1px solid #ccc; border-radius:4px; }
        button { width:100%; padding:12px; background:#1e3a5f; color:white; border:none; border-radius:4px; cursor:pointer; }
        .error { color:red; text-align:center; }
    </style>
</head>
<body>

<div class="login-box">
    <h2>🔑 Login Admin</h2>
    
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST" action="login.php">
        <input type="text" name="username" placeholder="Username" required autofocus>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    
    <p style="text-align:center; margin-top:15px; font-size:0.85rem;">
        Default: <strong>admin</strong> / <strong>123456</strong>
    </p>
</div>

</body>
</html>