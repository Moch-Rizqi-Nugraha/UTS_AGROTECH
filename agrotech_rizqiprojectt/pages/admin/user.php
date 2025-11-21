<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin'){
  header("Location: ../../auth/login.php");
  exit;
}
include('../../config/db.php');
include('../../includes/header.php');
?>

<div class="container mt-5">
  <h3 class="text-success">Manajemen User</h3>
  <table class="table table-bordered mt-3">
    <thead class="table-success">
      <tr><th>No</th><th>Nama</th><th>Email</th><th>Role</th><th>Opsi</th></tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      $users = mysqli_query($conn, "SELECT * FROM users");
      while($u=mysqli_fetch_assoc($users)){
        echo "<tr>
          <td>$no</td>
          <td>{$u['nama']}</td>
          <td>{$u['email']}</td>
          <td>{$u['role']}</td>
          <td><a href='user_hapus.php?id={$u['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus user?\")'>Hapus</a></td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
</div>

<?php include('../../includes/footer.php'); ?>
