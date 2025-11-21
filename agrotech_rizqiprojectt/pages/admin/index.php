<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin'){
  header("Location: ../../auth/login.php");
  exit;
}
include('../../config/db.php');
include('../../includes/header.php');
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
        <li class="nav-item"><a class="nav-link" href="user.php">User</a></li>
        <li class="nav-item"><a class="nav-link" href="edukasi.php">Edukasi</a></li>
        <li class="nav-item"><a class="nav-link" href="../../auth/logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h2 class="text-success">Selamat Datang, <?php echo $_SESSION['user']['nama']; ?> (Admin)</h2>
  <p>Gunakan menu di atas untuk mengelola data website Agrotech Marketplace.</p>
</div>

<?php include('../../includes/footer.php'); ?>
