<?php
// Deteksi path
$current_dir = basename(dirname($_SERVER['PHP_SELF']));
$is_root = ($current_dir == basename($_SERVER['DOCUMENT_ROOT']) || $current_dir == '');
$base = $is_root ? '' : '../';
?>

<!-- ================= FOOTER ================= -->
<footer class="bg-dark text-white pt-5 pb-3 mt-5">
  <div class="container">
    <div class="row g-4">
      <!-- Kolom 1: About -->
      <div class="col-lg-4 col-md-6">
        <h5 class="text-success fw-bold mb-4">
          <i class="bi bi-flower2 me-2"></i>Agrotech Marketplace
        </h5>
        <p class="text-white-50 mb-4">
          Platform digital terpercaya untuk jual beli produk pertanian berkualitas tinggi dari petani Indonesia.
        </p>
        <div class="social-links">
          <a href="#" class="text-white me-3" title="Facebook">
            <i class="bi bi-facebook fs-5"></i>
          </a>
          <a href="#" class="text-white me-3" title="Instagram">
            <i class="bi bi-instagram fs-5"></i>
          </a>
          <a href="#" class="text-white me-3" title="Twitter">
            <i class="bi bi-twitter fs-5"></i>
          </a>
          <a href="#" class="text-white" title="WhatsApp">
            <i class="bi bi-whatsapp fs-5"></i>
          </a>
        </div>
      </div>
      
      <!-- Kolom 2: Quick Links -->
      <div class="col-lg-2 col-md-6">
        <h6 class="text-success fw-bold mb-4">Menu Cepat</h6>
        <ul class="list-unstyled">
          <li class="mb-2">
            <a href="<?php echo $base; ?>index.php" class="text-white-50 text-decoration-none">
              <i class="bi bi-chevron-right me-1"></i> Beranda
            </a>
          </li>
          <li class="mb-2">
            <a href="<?php echo $base; ?>pages/home.php" class="text-white-50 text-decoration-none">
              <i class="bi bi-chevron-right me-1"></i> Produk
            </a>
          </li>
          <li class="mb-2">
            <a href="<?php echo $base; ?>pages/edukasi.php" class="text-white-50 text-decoration-none">
              <i class="bi bi-chevron-right me-1"></i> Edukasi
            </a>
          </li>
          <li class="mb-2">
            <a href="<?php echo $base; ?>auth/register.php" class="text-white-50 text-decoration-none">
              <i class="bi bi-chevron-right me-1"></i> Daftar
            </a>
          </li>
        </ul>
      </div>
      
      <!-- Kolom 3: Kategori -->
      <div class="col-lg-3 col-md-6">
        <h6 class="text-success fw-bold mb-4">Kategori Produk</h6>
        <ul class="list-unstyled">
          <li class="mb-2">
            <a href="#" class="text-white-50 text-decoration-none">
              <i class="bi bi-chevron-right me-1"></i> Sayuran Fresh
            </a>
          </li>
          <li class="mb-2">
            <a href="#" class="text-white-50 text-decoration-none">
              <i class="bi bi-chevron-right me-1"></i> Buah-buahan
            </a>
          </li>
          <li class="mb-2">
            <a href="#" class="text-white-50 text-decoration-none">
              <i class="bi bi-chevron-right me-1"></i> Kayu Berkualitas
            </a>
          </li>
          <li class="mb-2">
            <a href="#" class="text-white-50 text-decoration-none">
              <i class="bi bi-chevron-right me-1"></i> Bibit Tanaman
            </a>
          </li>
        </ul>
      </div>
      
      <!-- Kolom 4: Kontak -->
      <div class="col-lg-3 col-md-6">
        <h6 class="text-success fw-bold mb-4">Hubungi Kami</h6>
        <ul class="list-unstyled">
          <li class="mb-3 text-white-50">
            <i class="bi bi-geo-alt-fill text-success me-2"></i>
            Jl. Pertanian No. 123<br>
            <span class="ms-4">Bandung, Indonesia</span>
          </li>
          <li class="mb-3 text-white-50">
            <i class="bi bi-envelope-fill text-success me-2"></i>
            info@agrotech.com
          </li>
          <li class="mb-3 text-white-50">
            <i class="bi bi-telephone-fill text-success me-2"></i>
            +62 812-3456-7890
          </li>
          <li class="text-white-50">
            <i class="bi bi-clock-fill text-success me-2"></i>
            Senin - Sabtu: 08:00 - 17:00
          </li>
        </ul>
      </div>
    </div>
    
    <!-- Copyright Bar -->
    <hr class="border-secondary my-4">
    <div class="row">
      <div class="col-md-6 text-center text-md-start">
        <p class="text-white-50 mb-0">
          &copy; <?php echo date('Y'); ?> <strong>Agrotech Marketplace</strong>. All Rights Reserved.
        </p>
      </div>
      <div class="col-md-6 text-center text-md-end">
        <p class="text-white-50 mb-0">
          Developed by <strong class="text-success">22101122_RIZQI_MAHASISWA_TI01</strong>
        </p>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JavaScript -->
<?php
if ($is_root) {
    echo '<script src="assets/js/script.js"></script>';
} else {
    echo '<script src="../assets/js/script.js"></script>';
}
?>

</body>
</html>