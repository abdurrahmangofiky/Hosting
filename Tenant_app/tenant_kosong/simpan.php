<?php
include "../config/koneksi.php";

// Ambil data dari form
$lokasi       = $_POST['lokasi'];
$luas         = $_POST['luas'];
$status       = $_POST['status'];

// File gambar
$gambar       = $_FILES['gambar']['name'];
$tmp          = $_FILES['gambar']['tmp_name'];

// Upload file ke folder tenant_kosong/gambar/
move_uploaded_file($tmp, "gambar/".$gambar);

// Masa sewa 3 tahun
$harga_3th       = $_POST['harga_3th'];
$service_3th     = $_POST['service_3th'];
$dp_3th          = $_POST['dp_3th'];
$pelunasan_3th   = $_POST['pelunasan_3th'];
$perhitungan_3th = $_POST['perhitungan_3th'];

// Masa sewa 5 tahun
$harga_5th       = $_POST['harga_5th'];
$service_5th     = $_POST['service_5th'];
$dp_5th          = $_POST['dp_5th'];
$pelunasan_5th   = $_POST['pelunasan_5th'];
$perhitungan_5th = $_POST['perhitungan_5th'];

// Simpan ke database
mysqli_query($koneksi, "
INSERT INTO tenant_kosong SET
lokasi='$lokasi',
luas='$luas',
status='$status',
gambar='$gambar',
harga_3th='$harga_3th',
service_3th='$service_3th',
dp_3th='$dp_3th',
pelunasan_3th='$pelunasan_3th',
perhitungan_3th='$perhitungan_3th',
harga_5th='$harga_5th',
service_5th='$service_5th',
dp_5th='$dp_5th',
pelunasan_5th='$pelunasan_5th',
perhitungan_5th='$perhitungan_5th'
");

header("Location: index.php");
