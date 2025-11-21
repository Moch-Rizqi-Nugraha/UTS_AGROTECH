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
  <h3 class="text-success">Kelola Produk</h3>
  <form method="POST" enctype="multipart/form-data" class="mb-4">
    <div class="row">
      <div class="col-md-3"><input type="text" name="nama" placeholder="Nama Produk" class="form-control" required></div>
      <div class="col-md-2"><input type="number" name="harga" placeholder="Harga" class="form-control" required></div>
      <div class="col-md-3"><input type="text" name="kategori" placeholder="Kategori" class="form-control" required></div>
      <div class="col-md-2"><input type="file" name="gambar" class="form-control" required></div>
      <div class="col-md-2"><button name="add" class="btn btn-success w-100">Tambah</button></div>
    </div>
    <div class="mt-2"><textarea name="deskripsi" class="form-control" placeholder="Deskripsi Produk" required></textarea></div>
  </form>

  <?php
  if(isset($_POST['add'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/produk/".$gambar);
    mysqli_query($conn, "INSERT INTO produk (nama_produk, deskripsi, harga, kategori, gambar)
                         VALUES ('$nama','$deskripsi','$harga','$kategori','$gambar')");
    echo "<script>alert('Produk berhasil ditambahkan!'); window.location='produk.php';</script>";
  }
  ?>

  <table class="table table-bordered mt-4">
    <thead class="table-success">
      <tr><th>No</th><th>Nama</th><th>Harga</th><th>Kategori</th><th>Opsi</th></tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      $result = mysqli_query($conn, "SELECT * FROM produk");
      while($p=mysqli_fetch_assoc($result)){
        echo "<tr>
          <td>$no</td>
          <td>{$p['nama_produk']}</td>
          <td>Rp".number_format($p['harga'])."</td>
          <td>{$p['kategori']}</td>
          <td>
            <a href='produk_edit.php?id={$p['id']}' class='btn btn-warning btn-sm'>Edit</a>
            <a href='produk_hapus.php?id={$p['id']}' onclick='return confirm(\"Hapus data?\")' class='btn btn-danger btn-sm'>Hapus</a>
          </td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>
</div>

<?php include('../../includes/footer.php'); ?>
