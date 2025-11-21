<?php
include('../config/db.php');
session_start();

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
  $user = mysqli_fetch_assoc($query);

  if($user){
    $_SESSION['user'] = $user;
    if($user['role'] == 'admin'){
      header("Location: ../pages/admin/index.php");
    } else {
      header("Location: ../pages/dashboard.php");
    }
  } else {
    echo "<script>alert('Email atau password salah!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login - Agrotech</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
  <h3 class="text-center text-success">Login ke Agrotech Marketplace</h3>
  <form method="POST" class="col-md-4 mx-auto mt-4">
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button name="login" class="btn btn-success w-100">Login</button>
  </form>
</div>
</body>
</html>
