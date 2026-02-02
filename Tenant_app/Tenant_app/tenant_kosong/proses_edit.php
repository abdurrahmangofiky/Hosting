<?php
session_start();
include "../config/koneksi.php";

$id = $_POST['id'];
$lokasi = $_POST['lokasi'];
$luas = $_POST['luas'];
$status = $_POST['status'];

// Masa sewa 3 Tahun
$harga_3th = $_POST['harga_3th'];
$service_3th = $_POST['service_3th'];
$dp_3th = $_POST['dp_3th'];
$pelunasan_3th = $_POST['pelunasan_3th'];
$perhitungan_3th = $_POST['perhitungan_3th'];

// Masa sewa 5 Tahun
$harga_5th = $_POST['harga_5th'];
$service_5th = $_POST['service_5th'];
$dp_5th = $_POST['dp_5th'];
$pelunasan_5th = $_POST['pelunasan_5th'];
$perhitungan_5th = $_POST['perhitungan_5th'];

// Gambar
if(isset($_FILES['gambar']) && $_FILES['gambar']['name'] != '') {
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, 'gambar/'.$gambar);
    $update_gambar = ", gambar='$gambar'";
} else {
    $update_gambar = "";
}

// Update database
$id = $_POST['id'];
$lokasi = $_POST['lokasi'];
$luas = $_POST['luas'];
$harga_3th = $_POST['harga_3th'];
$service_3th = $_POST['service_3th'];
$dp_3th = $_POST['dp_3th'];
$pelunasan_3th = $_POST['pelunasan_3th'];
$perhitungan_3th = $_POST['perhitungan_3th'];
$harga_5th = $_POST['harga_5th'];
$service_5th = $_POST['service_5th'];
$dp_5th = $_POST['dp_5th'];
$pelunasan_5th = $_POST['pelunasan_5th'];
$perhitungan_5th = $_POST['perhitungan_5th'];
$gambar = $_FILES['gambar']['lgf_no_29.png'];
if($_FILES['gambar']['name'] != "") {
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/$gambar");
    mysqli_query($koneksi, "UPDATE tenant_kosong SET gambar='$gambar' WHERE id='$id'");
}



mysqli_query($koneksi, "UPDATE tenant_kosong SET lokasi='$lokasi', luas='$luas', harga_3th='$harga_3th', service_3th='$service_3th', dp_3th='$dp_3th', pelunasan_3th='$pelunasan_3th', perhitungan_3th='$perhitungan_3th', harga_5th='$harga_5th', service_5th='$service_5th', dp_5th='$dp_5th', pelunasan_5th='$pelunasan_5th', perhitungan_5th='$perhitungan_5th', gambar='$gambar' WHERE id='$id'");



// Kembali ke halaman tenant kosong
header("Location: index.php");
exit;
?>
