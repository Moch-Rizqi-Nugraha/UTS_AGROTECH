<?php
include('../config.php');
$data = json_decode(file_get_contents("php://input"), true);

if(!empty($data['nama_produk']) && !empty($data['harga'])){
    $nama = $data['nama_produk'];
    $harga = $data['harga'];
    $kategori = $data['kategori'];
    $deskripsi = $data['deskripsi'];
    $gambar = $data['gambar'] ?? 'default.jpg';

    $sql = "INSERT INTO produk (nama_produk, harga, kategori, deskripsi, gambar) 
            VALUES ('$nama','$harga','$kategori','$deskripsi','$gambar')";
    if(mysqli_query($conn, $sql)){
        echo json_encode(["message" => "Produk berhasil ditambahkan"]);
    } else {
        echo json_encode(["message" => "Gagal menambah produk"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["message" => "Data tidak lengkap"]);
}
