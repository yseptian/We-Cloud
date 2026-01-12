<?php
session_start();
include "koneksi.php";

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
$data = mysqli_fetch_assoc($query);

if ($data && password_verify($password, $data['password'])) {
    $_SESSION['user_id'] = $data['user_id'];
    $_SESSION['nama'] = $data['nama'];
    header("Location: dashboard.php");
} else {
    echo "Login gagal";
}
