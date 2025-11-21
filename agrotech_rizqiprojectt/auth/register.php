<?php
include('../config/db.php');

if(isset($_POST['register'])){
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  
  $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  if(mysqli_num_rows($check) > 0){
    echo "<script>alert('Email sudah terdaftar');</script>";
  } else {
    mysqli_query($conn, "INSERT INTO users (nama,email,password) VALUES ('$nama','$email','$password')");
    echo "<script>alert('Registrasi berhasil!'); window.location='login.php';</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register - Agrotech</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
  <h3 class="text-center text-success">Register Akun Baru</h3>
  <form method="POST" class="col-md-4 mx-auto mt-4">
    <div class="mb-3"><input type="text" name="nama" class="form-control" placeholder="Nama" required></div>
    <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
    <div class="mb-3"><input type="password" name="password" class="form-control" placeholder="Password" required></div>
    <button name="register" class="btn btn-success w-100">Register</button>
  </form>
</div>
</body>
</html>
