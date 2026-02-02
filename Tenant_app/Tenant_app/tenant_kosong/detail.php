<?php
session_start();
include "../config/koneksi.php";

$id = $_GET['id'];
$q = mysqli_query($koneksi, "SELECT * FROM tenant_kosong WHERE id='$id'");
$row = mysqli_fetch_assoc($q);

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Detail Tenant Kosong</title>
<link rel="stylesheet" href="../assets/css/global.css">
<style>
body {
    background: url('../assets/img/bg.png') no-repeat center center fixed;
    background-size: cover;
    font-family: Arial, sans-serif;
    margin:0;
    padding:0;
}

/* FORM UTAMA SEBAGAI CARD PUTIH */
.form-wrapper {
    background: #fff;
    padding: 40px;
    border-radius: 18px;
    max-width: 900px;
    margin: 40px auto;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

/* Judul halaman */
h1.page-title {
    text-align:center;
    color:#fff;
    margin:30px 0;
    font-size:32px;
}

/* Card putih utama */
.card-container {
    max-width: 1200px;
    margin: 0 auto 50px auto;
    background: #fff;          /* kotak putih */
    border-radius: 18px;
    padding:30px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    display: flex;
    flex-direction: column;
    gap:30px;
}

/* Wrapper gambar + info dasar */
.top-section {
    display: flex;
    gap: 30px;
    align-items: flex-start;
}

/* Gambar tenant */
.top-section img {
    width: 300px;
    border-radius:12px;
    object-fit:cover;
}

/* Info dasar (lokasi, luas, status) */
.basic-info {
    flex:1;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    gap:10px;
    margin-top: 20px;
}
.basic-info div { font-size:16px; color:#333; }

/* Masa sewa wrapper */
.rent-section {
    display: flex;
    justify-content: space-between;
    gap:20px;
    flex-wrap: wrap;
}

/* Box masa sewa */
.masa-sewa {
    flex:1;
    padding:20px;
    border-radius:12px;
    color:#fff;
    min-width:250px;
}
.box-3th { background:#1e60ff; text-align:center; }
.box-5th { background:#e53935; text-align:center; }

/* Row detail masa sewa */
.detail-row { margin:8px 0; font-size:15px; }

/* Tombol */
.btn{
    padding:12px 22px;
    border-radius:12px;
    border:none;
    font-size:15px;
    cursor:pointer;
    text-decoration:none;
    display:inline-block;
    margin-right:10px;
    margin-top:20px;
}
.btn-back{ background:#e53935; color:#fff; }
.btn-edit{ background:#1e60ff; color:#fff; }

hr { border:0; border-top:1px solid #ccc; margin:20px 0; }
</style>
</head>
<body>

<h1 class="page-title">Detail Tenant Kosong</h1>

<div class="card-container">

    <!-- Bagian Atas: Gambar + info dasar -->
    <div class="top-section">
        <img src="gambar/<?= $row['gambar'] ?>" alt="Tenant Image">


        <div class="basic-info">
            <div><strong>Lokasi:</strong> <?= $row['lokasi'] ?></div>
            <div><strong>Luas:</strong> <?= $row['luas'] ?> m²</div>
            <div><strong>Status:</strong> <?= $row['status'] ?></div>
        </div>
    </div>

    <!-- Bagian Masa Sewa -->
    <div class="rent-section">
        <div class="masa-sewa box-3th">
            <h3>🟥 Masa Sewa 3 Tahun</h3>
            <div class="detail-row"><strong>Harga:</strong> <?= $row['harga_3th'] ?></div>
            <div class="detail-row"><strong>Service Charge:</strong> <?= $row['service_3th'] ?></div>
            <div class="detail-row"><strong>DP 20%:</strong> <?= $row['dp_3th'] ?></div>
            <div class="detail-row"><strong>Pelunasan 80%:</strong> <?= $row['pelunasan_3th'] ?></div>
            <div class="detail-row"><strong>Perhitungan:</strong> <?= $row['perhitungan_3th'] ?></div>
        </div>

        <div class="masa-sewa box-5th">
            <h3>🟦 Masa Sewa 5 Tahun</h3>
            <div class="detail-row"><strong>Harga:</strong> <?= $row['harga_5th'] ?></div>
            <div class="detail-row"><strong>Service Charge:</strong> <?= $row['service_5th'] ?></div>
            <div class="detail-row"><strong>DP 20%:</strong> <?= $row['dp_5th'] ?></div>
            <div class="detail-row"><strong>Pelunasan 80%:</strong> <?= $row['pelunasan_5th'] ?></div>
            <div class="detail-row"><strong>Perhitungan:</strong> <?= $row['perhitungan_5th'] ?></div>
        </div>
    </div>

    <!-- Tombol -->
    <div>
        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-edit">✏️ Edit</a>
        <a href="index.php" class="btn btn-back">⬅️ Kembali</a>
    </div>

</div>
</body>
</html>
