<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Deteksi lokasi file saat ini untuk path yang tepat
$current_dir = basename(dirname($_SERVER['PHP_SELF']));
$is_root = ($current_dir == basename($_SERVER['DOCUMENT_ROOT']) || $current_dir == '');
$is_pages = ($current_dir == 'pages');
$is_auth = ($current_dir == 'auth');
$is_admin = ($current_dir == 'admin');

// Set base path berdasarkan lokasi
if ($is_root) {
    $base = '';
} elseif ($is_pages || $is_auth) {
    $base = '../';
} elseif ($is_admin) {
    $base = '../../';
} else {
    $base = '../';
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-gradient d-flex align-items-center" href="<?php echo $base; ?>index.php">
      <i class="bi bi-flower2 me-2 fs-4"></i>
      <span class="fs-4">Agrotech</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item">
          <a class="nav-link fw-semibold" href="<?php echo $base; ?>index.php">
            <i class="bi bi-house-door me-1"></i> Beranda
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold" href="<?php echo $base; ?>pages/home.php">
            <i class="bi bi-grid me-1"></i> Produk
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold" href="<?php echo $base; ?>pages/edukasi.php">
            <i class="bi bi-book me-1"></i> Edukasi
          </a>
        </li>
        
        <?php if(isset($_SESSION['user'])): ?>
          <?php if($_SESSION['user']['role'] == 'admin'): ?>
            <li class="nav-item">
              <a class="nav-link fw-semibold" href="<?php echo $base; ?>pages/admin/index.php">
                <i class="bi bi-speedometer2 me-1"></i> Admin
              </a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link fw-semibold" href="<?php echo $base; ?>pages/dashboard.php">
                <i class="bi bi-person-circle me-1"></i> Dashboard
              </a>
            </li>
          <?php endif; ?>
          <li class="nav-item ms-lg-2">
            <a class="nav-link btn btn-outline-danger btn-sm px-3" href="<?php echo $base; ?>auth/logout.php">
              <i class="bi bi-box-arrow-right me-1"></i> Logout
            </a>
          </li>
        <?php else: ?>
          <li class="nav-item ms-lg-2">
            <a class="nav-link btn btn-outline-success btn-sm px-3 me-2" href="<?php echo $base; ?>auth/login.php">
              <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </a>
          </li>
          <li class="nav-item ms-lg-2">
            <a class="nav-link btn btn-success btn-sm px-3 text-white" href="<?php echo $base; ?>auth/register.php">
              <i class="bi bi-person-plus me-1"></i> Daftar
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>