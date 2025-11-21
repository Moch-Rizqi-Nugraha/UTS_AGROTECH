<?php
include('../config.php');
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;

if($id){
    $nama = $data['nama_produk'];
    $harga = $data['harga'];
    $kategori = $data['kategori'];
    $deskripsi = $data['deskripsi'];

    $sql = "UPDATE produk SET nama_produk='$nama', harga='$harga', kategori='$kategori', deskripsi='$deskripsi' WHERE id=$id";
    if(mysqli_query($conn, $sql)){
        echo json_encode(["message" => "Produk diperbarui"]);
    } else {
        echo json_encode(["message" => "Gagal memperbarui produk"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["message" => "ID tidak ditemukan"]);
}
