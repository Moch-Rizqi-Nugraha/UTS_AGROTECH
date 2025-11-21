<?php
include('../config/db.php');
include('../includes/header.php');
include('../includes/navbar.php');

if(!isset($_GET['id'])){
  header("Location: home.php");
  exit;
}

$id = intval($_GET['id']);
$res = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");

if(mysqli_num_rows($res) == 0) {
  header("Location: home.php");
  exit;
}

$produk = mysqli_fetch_assoc($res);
?>

<!-- ================= BREADCRUMB ================= -->
<section class="py-3 bg-light">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="../index.php" class="text-success text-decoration-none">Beranda</a></li>
        <li class="breadcrumb-item"><a href="home.php" class="text-success text-decoration-none">Produk</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($produk['nama_produk']); ?></li>
      </ol>
    </nav>
  </div>
</section>

<!-- ================= DETAIL PRODUK ================= -->
<section class="py-5">
  <div class="container">
    <div class="row g-5">
      <!-- Gambar Produk -->
      <div class="col-lg-6">
        <div class="product-image-wrapper">
          <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <img src="../assets/img/produk/<?php echo $produk['gambar']; ?>" 
                 class="img-fluid" 
                 alt="<?php echo htmlspecialchars($produk['nama_produk']); ?>"
                 style="width: 100%; height: 500px; object-fit: cover;"
                 onerror="this.src='../assets/img/no-image.jpg'">
            <div class="position-absolute top-0 start-0 m-3">
              <span class="badge bg-success fs-6 px-3 py-2">
                <i class="bi bi-star-fill me-1"></i> Produk Terbaru
              </span>
            </div>
          </div>
          
          <!-- Thumbnail Gallery (Optional) -->
          <div class="row g-2 mt-3">
            <div class="col-3">
              <img src="../assets/img/produk/<?php echo $produk['gambar']; ?>" 
                   class="img-fluid rounded shadow-sm" 
                   style="height: 100px; object-fit: cover; cursor: pointer;">
            </div>
            <div class="col-3">
              <img src="../assets/img/produk/<?php echo $produk['gambar']; ?>" 
                   class="img-fluid rounded shadow-sm" 
                   style="height: 100px; object-fit: cover; cursor: pointer; opacity: 0.7;">
            </div>
            <div class="col-3">
              <img src="../assets/img/produk/<?php echo $produk['gambar']; ?>" 
                   class="img-fluid rounded shadow-sm" 
                   style="height: 100px; object-fit: cover; cursor: pointer; opacity: 0.7;">
            </div>
            <div class="col-3">
              <img src="../assets/img/produk/<?php echo $produk['gambar']; ?>" 
                   class="img-fluid rounded shadow-sm" 
                   style="height: 100px; object-fit: cover; cursor: pointer; opacity: 0.7;">
            </div>
          </div>
        </div>
      </div>

      <!-- Info Produk -->
      <div class="col-lg-6">
        <div class="product-info">
          <span class="badge bg-light text-success border border-success mb-3">
            <i class="bi bi-tag"></i> Kategori: Pertanian
          </span>
          
          <h1 class="fw-bold mb-3 display-6"><?php echo htmlspecialchars($produk['nama_produk']); ?></h1>
          
          <!-- Rating -->
          <div class="d-flex align-items-center mb-3">
            <div class="text-warning me-2">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-half"></i>
            </div>
            <span class="text-muted">(4.5 dari 5 | 128 ulasan)</span>
          </div>

          <!-- Harga -->
          <div class="bg-light rounded-3 p-4 mb-4">
            <div class="d-flex align-items-center justify-content-between">
              <div>
                <small class="text-muted d-block mb-1">Harga</small>
                <h2 class="text-success fw-bold mb-0">
                  Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?>
                </h2>
              </div>
              <div class="text-end">
                <span class="badge bg-success fs-6 px-3 py-2">
                  <i class="bi bi-check-circle me-1"></i> Tersedia
                </span>
              </div>
            </div>
          </div>

          <!-- Deskripsi -->
          <div class="mb-4">
            <h5 class="fw-bold mb-3">
              <i class="bi bi-info-circle text-success me-2"></i>Deskripsi Produk
            </h5>
            <p class="text-muted" style="text-align: justify; line-height: 1.8;">
              <?php echo nl2br(htmlspecialchars($produk['deskripsi'])); ?>
            </p>
          </div>

          <!-- Spesifikasi -->
          <div class="mb-4">
            <h5 class="fw-bold mb-3">
              <i class="bi bi-list-check text-success me-2"></i>Spesifikasi
            </h5>
            <ul class="list-unstyled">
              <li class="mb-2">
                <i class="bi bi-check-circle-fill text-success me-2"></i>
                <strong>Kondisi:</strong> Baru
              </li>
              <li class="mb-2">
                <i class="bi bi-check-circle-fill text-success me-2"></i>
                <strong>Berat:</strong> 1 Kg
              </li>
              <li class="mb-2">
                <i class="bi bi-check-circle-fill text-success me-2"></i>
                <strong>Stok:</strong> Tersedia
              </li>
              <li class="mb-2">
                <i class="bi bi-check-circle-fill text-success me-2"></i>
                <strong>Pengiriman:</strong> Seluruh Indonesia
              </li>
            </ul>
          </div>

          <!-- Quantity & Action Buttons -->
          <div class="mb-4">
            <label class="form-label fw-bold">Jumlah:</label>
            <div class="input-group mb-3" style="max-width: 150px;">
              <button class="btn btn-outline-success" type="button" onclick="decreaseQty()">
                <i class="bi bi-dash"></i>
              </button>
              <input type="number" class="form-control text-center" value="1" min="1" id="qtyInput">
              <button class="btn btn-outline-success" type="button" onclick="increaseQty()">
                <i class="bi bi-plus"></i>
              </button>
            </div>
          </div>

          <div class="d-grid gap-3">
            <button class="btn btn-success btn-lg py-3 fw-bold" onclick="buyNow()">
              <i class="bi bi-cart-check me-2"></i> Beli Sekarang
            </button>
            <div class="row g-2">
              <div class="col-6">
                <button class="btn btn-outline-success w-100 py-2" onclick="addToCart()">
                  <i class="bi bi-cart-plus me-1"></i> Tambah ke Keranjang
                </button>
              </div>
              <div class="col-6">
                <button class="btn btn-outline-secondary w-100 py-2" onclick="addToWishlist()">
                  <i class="bi bi-heart me-1"></i> Wishlist
                </button>
              </div>
            </div>
          </div>

          <!-- Share -->
          <div class="mt-4 pt-4 border-top">
            <h6 class="fw-bold mb-3">Bagikan:</h6>
            <div class="d-flex gap-2">
              <button class="btn btn-outline-primary btn-sm">
                <i class="bi bi-facebook"></i>
              </button>
              <button class="btn btn-outline-info btn-sm">
                <i class="bi bi-twitter"></i>
              </button>
              <button class="btn btn-outline-success btn-sm">
                <i class="bi bi-whatsapp"></i>
              </button>
              <button class="btn btn-outline-danger btn-sm">
                <i class="bi bi-envelope"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= PRODUK TERKAIT ================= -->
<section class="py-5 bg-light">
  <div class="container">
    <h3 class="text-center fw-bold mb-5">
      <i class="bi bi-grid-3x3-gap text-success me-2"></i>
      Produk Terkait
    </h3>
    <div class="row g-4">
      <?php
      $related = mysqli_query($conn, "SELECT * FROM produk WHERE id != $id ORDER BY RAND() LIMIT 4");
      while($rel = mysqli_fetch_assoc($related)) {
      ?>
        <div class="col-lg-3 col-md-6">
          <div class="card product-card shadow-custom h-100 border-0">
            <div class="position-relative overflow-hidden">
              <img src="../assets/img/produk/<?php echo $rel['gambar']; ?>" 
                   class="card-img-top" 
                   alt="<?php echo htmlspecialchars($rel['nama_produk']); ?>" 
                   style="height: 200px; object-fit: cover;">
            </div>
            <div class="card-body">
              <h6 class="card-title text-success fw-bold mb-2">
                <?php echo htmlspecialchars($rel['nama_produk']); ?>
              </h6>
              <h6 class="fw-bold text-dark mb-3">
                Rp <?php echo number_format($rel['harga'], 0, ',', '.'); ?>
              </h6>
              <a href="detail.php?id=<?php echo $rel['id']; ?>" class="btn btn-success btn-sm w-100">
                <i class="bi bi-eye"></i> Lihat Detail
              </a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- ================= FOOTER ================= -->
<?php include('../includes/footer.php'); ?>

<script>
function increaseQty() {
  const input = document.getElementById('qtyInput');
  input.value = parseInt(input.value) + 1;
}

function decreaseQty() {
  const input = document.getElementById('qtyInput');
  if(parseInt(input.value) > 1) {
    input.value = parseInt(input.value) - 1;
  }
}

function buyNow() {
  const qty = document.getElementById('qtyInput').value;
  alert('Membeli ' + qty + ' item: <?php echo addslashes($produk['nama_produk']); ?>');
  // Redirect ke halaman checkout
  // window.location.href = 'checkout.php?id=<?php echo $id; ?>&qty=' + qty;
}

function addToCart() {
  const qty = document.getElementById('qtyInput').value;
  alert('Berhasil menambahkan ' + qty + ' item ke keranjang!');
}

function addToWishlist() {
  alert('Produk berhasil ditambahkan ke wishlist!');
}
</script>