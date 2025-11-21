<?php
// ============================
// AGROTECH_RIZQIPROJECT
// API - Read User Data (GET)
// ============================

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include('../config.php');

// Query data user (tanpa password demi keamanan)
$query = "SELECT id, nama, email, role FROM users ORDER BY id ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Gagal mengambil data user"
    ]);
    exit;
}

// Ambil data
$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

// Jika tidak ada data
if (count($users) === 0) {
    http_response_code(404);
    echo json_encode([
        "status" => "empty",
        "message" => "Belum ada data user yang tersedia"
    ]);
    exit;
}

// Jika data ditemukan
http_response_code(200);
echo json_encode([
    "status" => "success",
    "count" => count($users),
    "data" => $users
]);
