<?php
include('../config.php');
$data = json_decode(file_get_contents("php://input"), true);
if(!empty($data['judul']) && !empty($data['konten'])){
    $judul = $data['judul'];
    $konten = $data['konten'];
    $gambar = $data['gambar'] ?? 'default.jpg';
    $sql = "INSERT INTO edukasi (judul, konten, gambar) VALUES ('$judul','$konten','$gambar')";
    if(mysqli_query($conn, $sql)){
        echo json_encode(["message" => "Edukasi berhasil ditambahkan"]);
    } else {
        echo json_encode(["message" => "Gagal menambah edukasi"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["message" => "Data tidak lengkap"]);
}
