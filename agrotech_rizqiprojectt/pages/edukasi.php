<?php
include('../config/db.php');
include('../includes/header.php');
include('../includes/navbar.php');
?>

<!-- ================= HERO EDUKASI ================= -->
<section class="hero-main" style="background: linear-gradient(135deg, rgba(40, 167, 69, 0.9), rgba(32, 201, 151, 0.8)), url('../assets/img/hero-edu.jpg') center/cover no-repeat; min-height: 60vh;">
  <div class="container text-center text-white d-flex flex-column justify-content-center align-items-center h-100">
    <div class="hero-content animate-fade-in">
      <h1 class="fw-bold display-4 mb-4">📘 Edukasi Pertanian & Kualitas Kayu</h1>
      <p class="lead mb-0 fs-5">Pelajari berbagai tips dan informasi tentang kayu unggulan serta teknologi pertanian modern</p>
    </div>
  </div>
</section>

<!-- ================= EDUKASI LIST ================= -->
<section class="py-5">
  <div class="container">
    <div class="section-title text-center mb-5">
      <span class="badge bg-success mb-3 px-3 py-2">Pengetahuan Lengkap</span>
      <h2 class="text-gradient fw-bold display-5 mb-3">Artikel & Informasi Edukasi 🌿</h2>
      <p class="text-muted lead">Tingkatkan wawasan Anda tentang dunia pertanian dan kehutanan</p>
    </div>

    <div class="row g-4">
      <?php
      $result = mysqli_query($conn, "SELECT * FROM edukasi ORDER BY id DESC");
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="col-lg-4 col-md-6">
          <div class="card shadow-custom h-100 border-0 edu-card">
            <div class="position-relative overflow-hidden">
              <img src="../assets/img/produk/<?php echo $row['gambar']; ?>" 
                   class="card-img-top" 
                   alt="<?php echo htmlspecialchars($row['judul']); ?>" 
                   style="height: 240px; object-fit: cover;">
              <div class="card-overlay">
                <span class="badge bg-success">
                  <i class="bi bi-book"></i> Artikel Edukasi
                </span>
              </div>
            </div>
            <div class="card-body d-flex flex-column p-4">
              <h5 class="card-title text-success fw-bold mb-3">
                <?php echo htmlspecialchars($row['judul']); ?>
              </h5>
              <p class="card-text text-muted mb-4 flex-grow-1">
                <?php echo substr($row['konten'], 0, 150); ?>...
              </p>
              <button class="btn btn-success w-100 mt-auto" 
                      data-bs-toggle="modal" 
                      data-bs-target="#modalEdukasi<?php echo $row['id']; ?>">
                <i class="bi bi-book-half"></i> Baca Selengkapnya
              </button>
            </div>
          </div>
        </div>

        <!-- Modal Detail Edukasi -->
        <div class="modal fade" id="modalEdukasi<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="modalLabel<?php echo $row['id']; ?>" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content rounded-4 shadow-lg">
              <div class="modal-header bg-success text-white rounded-top-4">
                <h4 class="modal-title fw-bold" id="modalLabel<?php echo $row['id']; ?>">
                  <i class="bi bi-book me-2"></i>
                  <?php echo htmlspecialchars($row['judul']); ?>
                </h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body p-4">
                <div class="row">
                  <div class="col-md-5 mb-4 mb-md-0">
                    <img src="../assets/img/produk/<?php echo $row['gambar']; ?>" 
                         class="img-fluid rounded shadow" 
                         alt="<?php echo htmlspecialchars($row['judul']); ?>"
                         style="width: 100%; height: 400px; object-fit: cover;">
                    
                    <!-- Share Buttons -->
                    <div class="mt-4 text-center">
                      <h6 class="fw-bold mb-3">Bagikan Artikel</h6>
                      <div class="d-flex gap-2 justify-content-center">
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
                  <div class="col-md-7">
                    <div class="article-content">
                      <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                        <div class="me-3">
                          <div class="avatar-circle bg-success text-white">
                            <i class="bi bi-person"></i>
                          </div>
                        </div>
                        <div>
                          <h6 class="mb-1 fw-bold">Tim Agrotech</h6>
                          <small class="text-muted">
                            <i class="bi bi-calendar3 me-1"></i> 
                            <?php echo date('d M Y'); ?>
                          </small>
                        </div>
                      </div>

                      <div class="article-text">
                        <?php echo nl2br(htmlspecialchars($row['konten'])); ?>
                      </div>

                      <!-- Tags -->
                      <div class="mt-4 pt-3 border-top">
                        <h6 class="fw-bold mb-3">Tags:</h6>
                        <div class="d-flex gap-2 flex-wrap">
                          <span class="badge bg-light text-success border border-success">Pertanian</span>
                          <span class="badge bg-light text-success border border-success">Edukasi</span>
                          <span class="badge bg-light text-success border border-success">Tips</span>
                          <span class="badge bg-light text-success border border-success">Kayu</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer border-0 bg-light rounded-bottom-4">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                  <i class="bi bi-x-circle"></i> Tutup
                </button>
                <button type="button" class="btn btn-success">
                  <i class="bi bi-bookmark"></i> Simpan Artikel
                </button>
              </div>
            </div>
          </div>
        </div>
      <?php
        }
      } else {
        echo "<div class='col-12'>";
        echo "<div class='alert alert-info text-center py-5'>";
        echo "<i class='bi bi-info-circle fs-1 d-block mb-3'></i>";
        echo "<h5>Belum ada artikel edukasi yang tersedia</h5>";
        echo "<p class='mb-0'>Silakan cek kembali nanti untuk artikel terbaru</p>";
        echo "</div></div>";
      }
      ?>
    </div>
  </div>
</section>

<!-- ================= KATEGORI EDUKASI ================= -->
<section class="py-5 bg-light">
  <div class="container">
    <h3 class="text-center fw-bold mb-5">🎯 Kategori Edukasi</h3>
    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm h-100 category-card">
          <div class="card-body text-center p-4">
            <div class="mb-3">
              <i class="bi bi-tree text-success" style="font-size: 3rem;"></i>
            </div>
            <h5 class="fw-bold">Kehutanan</h5>
            <p class="text-muted small mb-0">Tips memilih kayu berkualitas</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm h-100 category-card">
          <div class="card-body text-center p-4">
            <div class="mb-3">
              <i class="bi bi-flower1 text-success" style="font-size: 3rem;"></i>
            </div>
            <h5 class="fw-bold">Pertanian</h5>
            <p class="text-muted small mb-0">Teknik bertani modern</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm h-100 category-card">
          <div class="card-body text-center p-4">
            <div class="mb-3">
              <i class="bi bi-droplet text-success" style="font-size: 3rem;"></i>
            </div>
            <h5 class="fw-bold">Irigasi</h5>
            <p class="text-muted small mb-0">Sistem pengairan efisien</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm h-100 category-card">
          <div class="card-body text-center p-4">
            <div class="mb-3">
              <i class="bi bi-bug text-success" style="font-size: 3rem;"></i>
            </div>
            <h5 class="fw-bold">Hama & Penyakit</h5>
            <p class="text-muted small mb-0">Cara mengatasi hama</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= CTA JOIN ================= -->
<section class="text-center text-white py-5" style="background: linear-gradient(135deg, rgba(40, 167, 69, 0.95), rgba(32, 201, 151, 0.95)), url('../assets/img/cta-bg.jpg') center/cover no-repeat;">
  <div class="container">
    <h2 class="fw-bold mb-3 display-5">🌱 Ingin Menambah Pengetahuan Tentang Pertanian?</h2>
    <p class="lead mb-5">Gabung bersama kami di Agrotech Marketplace dan dapatkan edukasi terbaru setiap minggu!</p>
    <div class="d-flex gap-3 justify-content-center flex-wrap">
      <a href="../auth/register.php" class="btn btn-light btn-lg px-5 py-3 fw-semibold">
        <i class="bi bi-person-plus"></i> Daftar Sekarang
      </a>
      <a href="home.php" class="btn btn-outline-light btn-lg px-5 py-3 fw-semibold">
        <i class="bi bi-basket"></i> Lihat Produk
      </a>
    </div>
  </div>
</section>

<!-- ================= FOOTER ================= -->
<?php include('../includes/footer.php'); ?>

<style>
.category-card {
  transition: all 0.3s ease;
  cursor: pointer;
}

.category-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 10px 30px rgba(40, 167, 69, 0.2) !important;
}

.category-card:hover i {
  transform: scale(1.1);
  transition: transform 0.3s ease;
}

.article-content {
  line-height: 1.8;
}

.article-text {
  font-size: 1rem;
  color: #495057;
  text-align: justify;
}

.article-text p {
  margin-bottom: 1.5rem;
}

.avatar-circle {
  width: 50px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  font-size: 1.5rem;
}

.modal-xl {
  max-width: 1200px;
}
</style>