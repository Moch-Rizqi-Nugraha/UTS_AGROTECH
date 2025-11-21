<?php
include('config/db.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- ================= HERO SECTION ================= -->
<section class="hero-main" style="background: linear-gradient(135deg, rgba(40, 167, 69, 0.9), rgba(32, 201, 151, 0.8)), url('assets/img/hero-bg.jpg') center/cover no-repeat; min-height: 90vh;">
  <div class="container text-center text-white d-flex flex-column justify-content-center align-items-center h-100">
    <div class="hero-content animate-fade-in">
      <h1 class="fw-bold display-3 mb-4">🌾 Agrotech Marketplace</h1>
      <p class="lead mb-5 fs-4">Tempat bertemunya petani, penjual, dan pembeli produk pertanian terbaik Indonesia.</p>
      <div class="d-flex gap-3 justify-content-center flex-wrap">
        <a href="#produk" class="btn btn-light btn-lg px-5 py-3 fw-semibold shadow-lg">
          <i class="bi bi-basket"></i> Jelajahi Produk
        </a>
        <a href="pages/edukasi.php" class="btn btn-outline-light btn-lg px-5 py-3 fw-semibold">
          <i class="bi bi-book"></i> Pelajari Lebih Lanjut
        </a>
      </div>
    </div>
  </div>
  <!-- Scroll Indicator -->
  <div class="scroll-indicator">
    <a href="#produk" class="text-white">
      <i class="bi bi-chevron-down fs-1"></i>
    </a>
  </div>
</section>

<!-- ================= FEATURES SECTION ================= -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="row text-center g-4">
      <div class="col-md-4 animate-slide-left">
        <div class="feature-box p-4">
          <div class="feature-icon mb-3">
            <i class="bi bi-shield-check text-success fs-1"></i>
          </div>
          <h4 class="fw-bold">Produk Terpercaya</h4>
          <p class="text-muted">Semua produk telah melalui verifikasi kualitas dan keamanan</p>
        </div>
      </div>
      <div class="col-md-4 animate-fade-in">
        <div class="feature-box p-4">
          <div class="feature-icon mb-3">
            <i class="bi bi-truck text-success fs-1"></i>
          </div>
          <h4 class="fw-bold">Pengiriman Cepat</h4>
          <p class="text-muted">Jaringan distribusi ke seluruh Indonesia dengan aman</p>
        </div>
      </div>
      <div class="col-md-4 animate-slide-right">
        <div class="feature-box p-4">
          <div class="feature-icon mb-3">
            <i class="bi bi-people text-success fs-1"></i>
          </div>
          <h4 class="fw-bold">Komunitas Aktif</h4>
          <p class="text-muted">Bergabung dengan ribuan petani dan pembeli di Indonesia</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= PRODUK TERBARU ================= -->
<section id="produk" class="py-5 bg-light">
  <div class="container">
    <div class="section-title text-center mb-5">
      <span class="badge bg-success mb-3 px-3 py-2">Produk Unggulan</span>
      <h2 class="text-gradient fw-bold display-5 mb-3">🛒 Produk Pertanian Terbaru</h2>
      <p class="text-muted lead">Temukan produk pertanian berkualitas tinggi dari petani terpercaya</p>
    </div>
    <div class="row g-4">
      <?php
      $result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC LIMIT 6");
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="col-lg-4 col-md-6">
          <div class="card product-card shadow-custom h-100 border-0">
            <div class="position-relative overflow-hidden">
              <img src="assets/img/produk/<?php echo $row['gambar']; ?>" class="card-img-top" alt="<?php echo $row['nama_produk']; ?>" style="height: 250px; object-fit: cover;">
              <span class="badge bg-success position-absolute top-0 end-0 m-3">Baru</span>
            </div>
            <div class="card-body d-flex flex-column p-4">
              <h5 class="card-title text-success fw-bold mb-2"><?php echo $row['nama_produk']; ?></h5>
              <p class="card-text text-muted mb-3 flex-grow-1"><?php echo substr($row['deskripsi'], 0, 100); ?>...</p>
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <div>
                  <small class="text-muted d-block">Harga</small>
                  <h5 class="fw-bold mb-0 text-dark">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></h5>
                </div>
                <a href="pages/detail.php?id=<?php echo $row['id']; ?>" class="btn btn-success px-4">
                  <i class="bi bi-eye"></i> Detail
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php
        }
      } else {
        echo "<div class='col-12'><div class='alert alert-info text-center'>Belum ada produk yang tersedia.</div></div>";
      }
      ?>
    </div>
    <div class="text-center mt-5">
      <a href="pages/home.php" class="btn btn-success btn-lg px-5 py-3">
        <i class="bi bi-grid"></i> Lihat Semua Produk
      </a>
    </div>
  </div>
</section>

<!-- ================= EDUKASI ================= -->
<section id="edukasi" class="py-5 bg-white">
  <div class="container">
    <div class="section-title text-center mb-5">
      <span class="badge bg-success mb-3 px-3 py-2">Pengetahuan</span>
      <h2 class="text-gradient fw-bold display-5 mb-3">📘 Edukasi Pertanian & Kualitas Kayu</h2>
      <p class="text-muted lead">Tingkatkan pengetahuan Anda tentang pertanian modern dan kualitas kayu</p>
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
              <img src="assets/img/produk/<?php echo $e['gambar']; ?>" class="card-img-top" alt="<?php echo $e['judul']; ?>" style="height: 220px; object-fit: cover;">
              <div class="card-overlay">
                <span class="badge bg-success">Artikel</span>
              </div>
            </div>
            <div class="card-body p-4">
              <h5 class="card-title text-success fw-bold mb-3"><?php echo $e['judul']; ?></h5>
              <p class="card-text text-muted mb-4"><?php echo substr($e['konten'], 0, 120); ?>...</p>
              <a href="pages/edukasi.php" class="btn btn-outline-success w-100">
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
      <a href="pages/edukasi.php" class="btn btn-outline-success btn-lg px-5 py-3">
        <i class="bi bi-journals"></i> Lihat Semua Edukasi
      </a>
    </div>
  </div>
</section>

<!-- ================= STATISTICS SECTION ================= -->
<section class="py-5" style="background: linear-gradient(135deg, #28a745, #20c997);">
  <div class="container">
    <div class="row text-center text-white g-4">
      <div class="col-md-3 col-6">
        <div class="stat-item">
          <h2 class="display-4 fw-bold mb-2">500+</h2>
          <p class="mb-0">Produk Tersedia</p>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="stat-item">
          <h2 class="display-4 fw-bold mb-2">1000+</h2>
          <p class="mb-0">Petani Terdaftar</p>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="stat-item">
          <h2 class="display-4 fw-bold mb-2">5000+</h2>
          <p class="mb-0">Transaksi Sukses</p>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="stat-item">
          <h2 class="display-4 fw-bold mb-2">50+</h2>
          <p class="mb-0">Kota Terjangkau</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= ABOUT SECTION ================= -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <img src="assets/img/logo_agrotech.jpg" alt="About Agrotech" class="img-fluid rounded shadow-lg" style="object-fit: cover; height: 400px; width: 100%;">
      </div>
      <div class="col-lg-6">
        <span class="badge bg-success mb-3 px-3 py-2">Tentang Kami</span>
        <h2 class="fw-bold mb-4 display-6">Agrotech Marketplace</h2>
        <p class="lead text-muted mb-4">
          Platform digital inovatif yang menghubungkan petani, penjual, dan pembeli produk pertanian berkualitas tinggi dari seluruh Indonesia.
        </p>
        <ul class="list-unstyled mb-4">
          <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Produk berkualitas dan terverifikasi</li>
          <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Harga transparan dan kompetitif</li>
          <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Edukasi pertanian modern</li>
          <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Komunitas petani yang solid</li>
        </ul>
        <a href="auth/register.php" class="btn btn-success btn-lg px-5">
          <i class="bi bi-person-plus"></i> Gabung Sekarang
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ================= TESTIMONI ================= -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="section-title text-center mb-5">
      <span class="badge bg-success mb-3 px-3 py-2">Testimoni</span>
      <h2 class="text-gradient fw-bold display-5 mb-3">💬 Apa Kata Mereka</h2>
      <p class="text-muted lead">Pengalaman nyata dari pengguna Agrotech Marketplace</p>
    </div>
    <div class="row g-4 justify-content-center">
      <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-custom h-100 p-4 testimonial-card">
          <div class="d-flex align-items-center mb-3">
            <div class="avatar-circle bg-success text-white me-3">B</div>
            <div>
              <h6 class="fw-bold mb-0">Budi Santoso</h6>
              <small class="text-muted">Petani Sayur</small>
            </div>
          </div>
          <div class="mb-3">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
          <p class="text-muted">"Marketplace ini sangat membantu saya memasarkan hasil pertanian ke berbagai kota dengan mudah dan aman!"</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-custom h-100 p-4 testimonial-card">
          <div class="d-flex align-items-center mb-3">
            <div class="avatar-circle bg-success text-white me-3">R</div>
            <div>
              <h6 class="fw-bold mb-0">Rina Wijaya</h6>
              <small class="text-muted">Pengrajin Mebel</small>
            </div>
          </div>
          <div class="mb-3">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
          <p class="text-muted">"Saya belajar banyak tentang cara memilih kayu berkualitas lewat fitur edukasinya. Sangat bermanfaat!"</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow-custom h-100 p-4 testimonial-card">
          <div class="d-flex align-items-center mb-3">
            <div class="avatar-circle bg-success text-white me-3">A</div>
            <div>
              <h6 class="fw-bold mb-0">Ahmad Ridwan</h6>
              <small class="text-muted">Pembeli</small>
            </div>
          </div>
          <div class="mb-3">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
          <p class="text-muted">"Produk selalu fresh dan berkualitas. Pengirimannya juga cepat. Recommended banget!"</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= CTA SECTION ================= -->
<section class="py-5 text-center text-white" style="background: linear-gradient(135deg, rgba(40, 167, 69, 0.95), rgba(32, 201, 151, 0.95)), url('assets/img/cta-bg.jpg') center/cover no-repeat;">
  <div class="container">
    <h2 class="fw-bold mb-3 display-5">🌱 Siap Bergabung dengan Agrotech?</h2>
    <p class="lead mb-5">Daftar sekarang dan dapatkan akses ke ribuan produk pertanian berkualitas!</p>
    <div class="d-flex gap-3 justify-content-center flex-wrap">
      <a href="auth/register.php" class="btn btn-light btn-lg px-5 py-3 fw-semibold">
        <i class="bi bi-person-plus"></i> Daftar Gratis
      </a>
      <a href="auth/login.php" class="btn btn-outline-light btn-lg px-5 py-3 fw-semibold">
        <i class="bi bi-box-arrow-in-right"></i> Login
      </a>
    </div>
  </div>
</section>

<!-- ================= FOOTER ================= -->
<?php include('includes/footer.php'); ?>