<?php
include('../config.php');
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;

if($id){
    $sql = "DELETE FROM produk WHERE id=$id";
    if(mysqli_query($conn, $sql)){
        echo json_encode(["message" => "Produk dihapus"]);
    } else {
        echo json_encode(["message" => "Gagal menghapus produk"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["message" => "ID tidak ditemukan"]);
}
