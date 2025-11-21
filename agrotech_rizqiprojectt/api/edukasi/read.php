<?php
include('../config.php');
$result = mysqli_query($conn, "SELECT id, nama, email, role FROM users");
$data = [];
while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}
echo json_encode($data);
