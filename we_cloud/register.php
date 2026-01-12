<!DOCTYPE html>
<html lang="id">
<?php include "header.php"; ?>
<body>


<body class="auth-body">

<div class="container mt-5 col-md-4">
    <h3>Register We Cloud</h3>

    <form action="proses_register.php" method="POST">
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Daftar</button>
    </form>

    <div class="auth-link">
        Sudah punya akun?
        <a href="login.php">Login</a>
    </div>
</div>

</body>
</html>
