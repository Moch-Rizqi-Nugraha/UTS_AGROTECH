<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin'){
  header("Location: ../../auth/login.php");
  exit;
}
include('../../config/db.php');
include('../../includes/header.php');
?>

<div class="container mt-4">
  <h3 class="text-success">Kelola Edukasi Kayu</h3>
  <form method="POST" enctype="multipart/form-data" class="mb-4">
    <div class="mb-2"><input type="text" name="judul" placeholder="Judul Edukasi" class="form-control" required></div>
    <div class="mb-2"><textarea name="konten" class="form-control" placeholder="Konten Edukasi" required></textarea></div>
    <div class="mb-2"><input type="file" name="gambar" class="form-control" required></div>
    <button name="add" class="btn btn-success">Tambah Edukasi</button>
  </form>

  <?php
  if(isset($_POST['add'])){
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/produk/".$gambar);
    mysqli_query($conn, "INSERT INTO edukasi (judul, konten, gambar) VALUES ('$judul','$konten','$gambar')");
    echo "<script>alert('Edukasi ditambahkan!'); window.location='edukasi.php';</script>";
  }
  ?>

  <table class="table table-bordered mt-4">
    <thead class="table-success">
      <tr><th>No</th><th>Judul</th><th>Opsi</th></tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      $res = mysqli_query($conn, "SELECT * FROM edukasi");
      while($e=mysqli_fetch_assoc($res)){
        echo "<tr>
          <td>$no</td>
          <td>{$e['judul']}</td>
          <td>
            <a href='edukasi_edit.php?id={$e['id']}' class='btn btn-warning btn-sm'>Edit</a>
            <a href='edukasi_hapus.php?id={$e['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus edukasi?\")'>Hapus</a>
          </td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
</div>

<?php include('../../includes/footer.php'); ?>
