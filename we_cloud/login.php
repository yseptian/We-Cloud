<!DOCTYPE html>
<html lang="id">
<?php include "header.php"; ?>
<body>

<body class="auth-body">

<div class="container mt-5 col-md-4">
    <h3 class="text-center">Login We Cloud</h3>
    <form method="POST" action="proses_login.php">
        <input class="form-control mb-3" type="email" name="email" placeholder="Email" required>
        <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
        <button class="btn btn-primary w-100">Login</button>
    </form>
    <div class="auth-link">
        Belum punya akun?
        <a href="register.php">Daftar</a>
    </div>    
</div>

</body>
</html>
