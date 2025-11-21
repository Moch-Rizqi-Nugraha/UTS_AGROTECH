<?php
include('../config/db.php');
include('../includes/header.php');
include('../includes/navbar.php');
?>

<!-- ================= HERO SECTION ================= -->
<section class="hero-main" style="background: linear-gradient(135deg, rgba(40, 167, 69, 0.9), rgba(32, 201, 151, 0.8)), url('../assets/img/hero-bg.jpg') center/cover no-repeat; min-height: 70vh;">
  <div class="container text-center text-white d-flex flex-column justify-content-center align-items-center h-100">
    <div class="hero-content animate-fade-in">
      <h1 class="fw-bold display-4 mb-4">Selamat Datang di Agrotech Marketplace 🌾</h1>
      <p class="lead mb-4 fs-5">Tempat terbaik untuk menjual dan membeli produk pertanian berkualitas tinggi serta belajar tentang kayu unggulan Indonesia.</p>
      <a href="#produk" class="btn btn-light btn-lg px-5 py-3 fw-semibold shadow-lg">
        <i class="bi bi-basket"></i> Jelajahi Produk
      </a>
    </div>
  </div>
</section>

<!-- ================= FILTER & SEARCH SECTION ================= -->
<section class="py-4 bg-light border-bottom">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-3 mb-md-0">
        <div class="input-group">
          <span class="input-group-text bg-white border-end-0">
            <i class="bi bi-search text-success"></i>
          </span>
          <input type="text" class="form-control border-start-0" placeholder="Cari produk pertanian..." id="searchInput">
        </div>
      </div>
      <div class="col-md-6">
        <div class="d-flex gap-2 justify-content-md-end">
          <select class="form-select" style="max-width: 200px;">
            <option selected>Semua Kategori</option>
            <option>Sayuran</option>
            <option>Buah-buahan</option>
            <option>Kayu</option>
            <option>Bibit</option>
          </select>
          <select class="form-select" style="max-width: 150px;">
            <option selected>Urutkan</option>
            <option>Terbaru</option>
            <option>Termurah</option>
            <option>Termahal</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= PRODUK SECTION ================= -->
<section id="produk" class="py-5">
  <div class="container">
    <div class="section-title text-center mb-5">
      <span class="badge bg-success mb-3 px-3 py-2">Produk Terlengkap</span>
      <h2 class="text-gradient fw-bold display-5 mb-3">🌿 Produk Pertanian Terbaru</h2>
      <p class="text-muted lead">Temukan berbagai produk pertanian berkualitas dari petani terpercaya di seluruh Indonesia</p>
    </div>

    <div class="row g-4" id="productContainer">
      <?php
      $result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="col-lg-3 col-md-4 col-sm-6 product-item">
          <div class="card product-card shadow-custom h-100 border-0">
            <div class="position-relative overflow-hidden">
              <img src="../assets/img/produk/<?php echo $row['gambar']; ?>" 
                   class="card-img-top" 
                   alt="<?php echo htmlspecialchars($row['nama_produk']); ?>" 
                   style="height: 220px; object-fit: cover;"
                   onerror="this.src='../assets/img/no-image.jpg'">
              <span class="badge bg-success position-absolute top-0 end-0 m-3">
                <i class="bi bi-star-fill"></i> Baru
              </span>
              <div class="card-overlay-hover">
                <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn btn-light btn-sm">
                  <i class="bi bi-eye"></i> Lihat Detail
                </a>
              </div>
            </div>
            <div class="card-body d-flex flex-column p-3">
              <h6 class="card-title text-success fw-bold mb-2 product-name">
                <?php echo htmlspecialchars($row['nama_produk']); ?>
              </h6>
              <p class="card-text text-muted mb-3 small flex-grow-1 product-desc">
                <?php echo substr($row['deskripsi'], 0, 80); ?>...
              </p>
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <div>
                  <small class="text-muted d-block" style="font-size: 0.75rem;">Harga</small>
                  <h6 class="fw-bold mb-0 text-dark">
                    Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                  </h6>
                </div>
                <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm px-3">
                  <i class="bi bi-cart-plus"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php
        }
      } else {
        echo "<div class='col-12'><div class='alert alert-info text-center py-5'>";
        echo "<i class='bi bi-info-circle fs-1 d-block mb-3'></i>";
        echo "<h5>Belum ada produk yang tersedia</h5>";
        echo "<p class='mb-0'>Silakan cek kembali nanti</p>";
        echo "</div></div>";
      }
      ?>
    </div>

    <!-- Pagination -->
    <nav aria-label="Product pagination" class="mt-5">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</section>

<!-- ================= EDUKASI PREVIEW ================= -->
<section id="edukasi" class="bg-light py-5">
  <div class="container">
    <div class="section-title text-center mb-5">
      <span class="badge bg-success mb-3 px-3 py-2">Pengetahuan</span>
      <h2 class="text-gradient fw-bold display-5 mb-3">📘 Edukasi Pertanian & Kualitas Kayu</h2>
      <p class="text-muted lead">Pelajari tips dan trik pertanian modern</p>
    </div>
    <div class="row g-4">
      <?php
      $edu = mysqli_query($conn, "SELECT * FROM edukasi ORDER BY id DESC LIMIT 3");
      if (mysqli_num_rows($edu) > 0) {
        while ($e = mysqli_fetch_assoc($edu)) {
      ?>
        <div class="col-lg-4 col-md-6">
          <div class="card shadow-custom h-100 border-0 edu-card">
            <div class="position-relative overflow-hidden">
              <img src="../assets/img/produk/<?php echo $e['gambar']; ?>" 
                   class="card-img-top" 
                   alt="<?php echo htmlspecialchars($e['judul']); ?>" 
                   style="height: 200px; object-fit: cover;">
              <div class="card-overlay">
                <span class="badge bg-success">Artikel</span>
              </div>
            </div>
            <div class="card-body p-4">
              <h5 class="card-title text-success fw-bold mb-3">
                <?php echo htmlspecialchars($e['judul']); ?>
              </h5>
              <p class="card-text text-muted mb-4">
                <?php echo substr($e['konten'], 0, 100); ?>...
              </p>
              <a href="edukasi.php" class="btn btn-outline-success w-100">
                <i class="bi bi-book-half"></i> Baca Selengkapnya
              </a>
            </div>
          </div>
        </div>
      <?php
        }
      } else {
        echo "<div class='col-12'><div class='alert alert-info text-center'>Belum ada artikel edukasi yang tersedia.</div></div>";
      }
      ?>
    </div>
    <div class="text-center mt-5">
      <a href="edukasi.php" class="btn btn-success btn-lg px-5 py-3">
        <i class="bi bi-journals"></i> Lihat Semua Edukasi
      </a>
    </div>
  </div>
</section>

<!-- ================= CTA SECTION ================= -->
<section class="py-5 text-center text-white" style="background: linear-gradient(135deg, rgba(40, 167, 69, 0.95), rgba(32, 201, 151, 0.95)), url('../assets/img/cta-bg.jpg') center/cover no-repeat;">
  <div class="container">
    <h2 class="fw-bold mb-3 display-5">Gabung dengan Komunitas Agrotech</h2>
    <p class="lead mb-5">Dapatkan informasi terbaru tentang produk pertanian, edukasi, dan kualitas kayu unggulan.</p>
    <a href="../auth/register.php" class="btn btn-light btn-lg px-5 py-3 fw-semibold">
      <i class="bi bi-person-plus"></i> Daftar Sekarang
    </a>
  </div>
</section>

<!-- ================= FOOTER ================= -->
<?php include('../includes/footer.php'); ?>

<style>
.card-overlay-hover {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.7);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.card:hover .card-overlay-hover {
  opacity: 1;
}

.pagination .page-link {
  color: var(--primary-green);
  border-color: #dee2e6;
  transition: all 0.3s;
}

.pagination .page-link:hover {
  background-color: var(--light-green);
  border-color: var(--primary-green);
}

.pagination .page-item.active .page-link {
  background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
  border-color: var(--primary-green);
}
</style>

<script>
// Simple Search Filter
document.getElementById('searchInput').addEventListener('keyup', function() {
  const searchValue = this.value.toLowerCase();
  const products = document.querySelectorAll('.product-item');
  
  products.forEach(function(product) {
    const productName = product.querySelector('.product-name').textContent.toLowerCase();
    const productDesc = product.querySelector('.product-desc').textContent.toLowerCase();
    
    if (productName.includes(searchValue) || productDesc.includes(searchValue)) {
      product.style.display = '';
    } else {
      product.style.display = 'none';
    }
  });
});
</script>