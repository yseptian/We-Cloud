<?php
include "koneksi.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

mysqli_query($koneksi,
    "INSERT INTO users VALUES (NULL,'$nama','$email','$password')"
);

header("Location: login.php");
