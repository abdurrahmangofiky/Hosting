<?php
include "../config/koneksi.php";

$lokasi = $_POST['lokasi'];
$status = $_POST['status'];

mysqli_query($koneksi, "
    INSERT INTO tenant_kosong (lokasi, status)
    VALUES ('$lokasi', '$status')
");

header("Location: index.php");
