<?php
include('../../config/db.php');
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM edukasi WHERE id=$id");
header("Location: edukasi.php");
