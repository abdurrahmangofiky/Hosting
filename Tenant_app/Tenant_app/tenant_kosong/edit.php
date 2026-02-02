<?php
session_start();
include "../config/koneksi.php";

// Ambil data tenant berdasarkan ID
$id = $_GET['id'];
$q = mysqli_query($koneksi, "SELECT * FROM tenant_kosong WHERE id='$id'");
$row = mysqli_fetch_assoc($q);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Tenant Kosong</title>
<link rel="stylesheet" href="../assets/css/global.css">
<style>
body {
    background: url('../assets/img/bg.png') no-repeat center center fixed;
    background-size: cover;
    font-family: Arial, sans-serif;
    margin:0;
    padding:0;
}

/* Judul di atas card, font putih */
.page-title {
    text-align: center;
    color: #fff;
    font-size: 32px;
    font-weight: bold;
    margin-top: 40px;
}

/* FORM UTAMA SEBAGAI CARD PUTIH */
.form-wrapper {
    background: #fff;
    padding: 40px;
    border-radius: 18px;
    max-width: 900px;
    margin: 30px auto 60px auto;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

h3,label {
    color: #333;
    margin-bottom: 10px;
}

.form-group {
    margin-bottom: 20px;
}

input, select, textarea {
    width: 100%;
    padding: 14px;
    border-radius: 10px;
    border: 1px solid #ddd;
    font-size: 15px;
}

hr {
    margin: 30px 0;
    border: 0.5px solid #eee;
}

/* BUTTON */
.btn {
    width: 100%;
    padding: 14px;
    border-radius: 10px;
    border: none;
    margin-top: 10px;
    cursor: pointer;
    font-size: 15px;
}
.btn-primary { background:#1e60ff; color:#fff; }
.btn-danger { background:#e53935; color:#fff; text-decoration:none; display:inline-block; text-align:center; padding:14px; }
</style>
</head>
<body>

<div class="page-title">Edit Tenant Kosong</div>

<div class="form-wrapper">

<form action="proses_edit.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $row['id'] ?>">
<input type="hidden" name="status" value="<?= $row['status'] ?>">


<div class="form-group">
    <label>Lokasi Tenant</label>
    <input type="text" name="lokasi" value="<?= $row['lokasi'] ?>" required>
</div>

<div class="form-group">
    <label>Luas Sewa (m²)</label>
    <input type="text" name="luas" value="<?= $row['luas'] ?>" required>
</div>

<div class="form-group">
    <label>Gambar Unit Tenant (Kosong = tetap gambar lama)</label><br>
    <img src="gambar/<?= $row['gambar'] ?>" alt="Tenant" style="width:150px; border-radius:8px; margin-bottom:10px;"><br>
    <input type="file" name="gambar" accept="image/*">

</div>

<hr>

<h3 style="background:#e53935; color:#fff; padding:10px; border-radius:8px;">🟥 Masa Sewa 3 Tahun</h3>
<div class="form-group">
    <label>Harga Sewa 3 Tahun</label>
    <input type="text" name="harga_3th" value="<?= $row['harga_3th'] ?>" required>
</div>
<div class="form-group">
    <label>Service Charge 3 Tahun</label>
    <input type="text" name="service_3th" value="<?= $row['service_3th'] ?>" required>
</div>
<div class="form-group">
    <label>DP 20% (3 Tahun)</label>
    <input type="text" name="dp_3th" value="<?= $row['dp_3th'] ?>" required>
</div>
<div class="form-group">
    <label>Pelunasan 80% (3 Tahun)</label>
    <input type="text" name="pelunasan_3th" value="<?= $row['pelunasan_3th'] ?>" required>
</div>
<div class="form-group">
    <label>Perhitungan Sewa 3 Tahun</label>
    <input type="text" name="perhitungan_3th" value="<?= $row['perhitungan_3th'] ?>" required>
</div>

<hr>

<h3 style="background:#1e60ff; color:#fff; padding:10px; border-radius:8px;">🟦 Masa Sewa 5 Tahun</h3>
<div class="form-group">
    <label>Harga Sewa 5 Tahun</label>
    <input type="text" name="harga_5th" value="<?= $row['harga_5th'] ?>" required>
</div>
<div class="form-group">
    <label>Service Charge 5 Tahun</label>
    <input type="text" name="service_5th" value="<?= $row['service_5th'] ?>" required>
</div>
<div class="form-group">
    <label>DP 20% (5 Tahun)</label>
    <input type="text" name="dp_5th" value="<?= $row['dp_5th'] ?>" required>
</div>
<div class="form-group">
    <label>Pelunasan 80% (5 Tahun)</label>
    <input type="text" name="pelunasan_5th" value="<?= $row['pelunasan_5th'] ?>" required>
</div>
<div class="form-group">
    <label>Perhitungan Sewa 5 Tahun</label>
    <input type="text" name="perhitungan_5th" value="<?= $row['perhitungan_5th'] ?>" required>
</div>

<button class="btn btn-primary">Simpan Perubahan</button>
<a href="index.php" class="btn btn-danger">Kembali</a>

</form>
</div>
</body>
</html>
