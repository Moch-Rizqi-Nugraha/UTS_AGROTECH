<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'user'){
  header("Location: ../auth/login.php");
  exit;
}
include('../includes/header.php');
include('../includes/navbar.php');
?>

<div class="container mt-5">
  <h2 class="text-success">Selamat Datang, <?php echo $_SESSION['user']['nama']; ?>!</h2>
  <p>Di Dashboard User Agrotech Marketplace.</p>
  <a href="edukasi.php" class="btn btn-success">Lihat Edukasi</a>
  <a href="../index.php" class="btn btn-outline-success">Belanja Produk</a>
</div>

<?php include('../includes/footer.php'); ?>
