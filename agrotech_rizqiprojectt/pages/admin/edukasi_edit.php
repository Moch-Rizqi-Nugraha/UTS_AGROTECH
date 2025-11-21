<?php
include('../../config/db.php');
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM edukasi WHERE id=$id"));

if(isset($_POST['update'])){
  $judul = $_POST['judul'];
  $konten = $_POST['konten'];
  if($_FILES['gambar']['name'] != ''){
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/produk/".$gambar);
    mysqli_query($conn, "UPDATE edukasi SET judul='$judul', konten='$konten', gambar='$gambar' WHERE id=$id");
  } else {
    mysqli_query($conn, "UPDATE edukasi SET judul='$judul', konten='$konten' WHERE id=$id");
  }
  echo "<script>alert('Edukasi diperbarui'); window.location='edukasi.php';</script>";
}
?>

<div class="container mt-5">
  <h3>Edit Edukasi</h3>
  <form method="POST" enctype="multipart/form-data">
    <input type="text" name="judul" value="<?php echo $data['judul']; ?>" class="form-control mb-2">
    <textarea name="konten" class="form-control mb-2"><?php echo $data['konten']; ?></textarea>
    <input type="file" name="gambar" class="form-control mb-2">
    <button name="update" class="btn btn-success">Update</button>
  </form>
</div>
