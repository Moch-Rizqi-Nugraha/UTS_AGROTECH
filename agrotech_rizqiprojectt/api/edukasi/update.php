<?php
include('../config.php');
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;

if($id){
    $judul = $data['judul'];
    $konten = $data['konten'];
    $sql = "UPDATE edukasi SET judul='$judul', konten='$konten' WHERE id=$id";
    if(mysqli_query($conn, $sql)){
        echo json_encode(["message" => "Edukasi diperbarui"]);
    } else {
        echo json_encode(["message" => "Gagal memperbarui edukasi"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["message" => "ID tidak ditemukan"]);
}
