<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Agrotech Marketplace - Platform terbaik untuk jual beli produk pertanian berkualitas di Indonesia">
  <meta name="keywords" content="pertanian, marketplace, kayu, produk pertanian, indonesia">
  <meta name="author" content="Agrotech Marketplace">
  <title>Agrotech Marketplace - Platform Pertanian Indonesia</title>
  
  <!-- Bootstrap 5.3.0 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  
  <!-- Custom CSS -->
  <?php
  $current_dir = basename(dirname($_SERVER['PHP_SELF']));
  $is_root = ($current_dir == basename($_SERVER['DOCUMENT_ROOT']) || $current_dir == '');
  
  if ($is_root) {
      echo '<link rel="stylesheet" href="assets/css/style.css">';
  } else {
      echo '<link rel="stylesheet" href="../assets/css/style.css">';
  }
  ?>
  
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?php echo $is_root ? '' : '../'; ?>assets/img/favicon.ico">
  
  <!-- Google Fonts (Preload for performance) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>