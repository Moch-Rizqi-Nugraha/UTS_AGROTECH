<?php
include('../../config/db.php');
$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");
$data = mysqli_fetch_assoc($q);

if(isset($_POST['update'])){
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $kategori = $_POST['kategori'];
  $deskripsi = $_POST['deskripsi'];

  if($_FILES['gambar']['name'] != ''){
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/produk/".$gambar);
    mysqli_query($conn, "UPDATE produk SET nama_produk='$nama', harga='$harga', kategori='$kategori', deskripsi='$deskripsi', gambar='$gambar' WHERE id=$id");
  } else {
    mysqli_query($conn, "UPDATE produk SET nama_produk='$nama', harga='$harga', kategori='$kategori', deskripsi='$deskripsi' WHERE id=$id");
  }
  echo "<script>alert('Produk diperbarui'); window.location='produk.php';</script>";
}
?>

<div class="container mt-5">
  <h3>Edit Produk</h3>
  <form method="POST" enctype="multipart/form-data">
    <input type="text" name="nama" value="<?php echo $data['nama_produk']; ?>" class="form-control mb-2">
    <input type="number" name="harga" value="<?php echo $data['harga']; ?>" class="form-control mb-2">
    <input type="text" name="kategori" value="<?php echo $data['kategori']; ?>" class="form-control mb-2">
    <textarea name="deskripsi" class="form-control mb-2"><?php echo $data['deskripsi']; ?></textarea>
    <input type="file" name="gambar" class="form-control mb-2">
    <button name="update" class="btn btn-success">Update</button>
  </form>
</div>
