<?php
include('../config.php');
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;
if($id){
    mysqli_query($conn, "DELETE FROM edukasi WHERE id=$id");
    echo json_encode(["message" => "Edukasi dihapus"]);
} else {
    http_response_code(400);
    echo json_encode(["message" => "ID tidak ditemukan"]);
}
