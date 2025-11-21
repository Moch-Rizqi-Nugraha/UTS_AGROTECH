<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "agrotech_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if(!$conn){
    http_response_code(500);
    echo json_encode(["message" => "Koneksi database gagal"]);
    exit;
}
?>
