<?php
session_start();

// simulasi login biar ga error
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'admin';
}

$inisial = strtoupper(substr($_SESSION['username'], 0, 1));

// DATA SESUAI PERMINTAAN
include "../config/koneksi.php";
$q = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tenant_aktif");
$tenantAktif = mysqli_fetch_assoc($q)['total'];
$q = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pengajuan_negosiasi");
$d = mysqli_fetch_assoc($q);
$total_pn = $d['total'];
$q = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM tenant_kosong");
$tenantKosong = mysqli_fetch_assoc($q)['total'];


?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/global.css">
</head>
<body>

<div class="container">

    <!-- SIDEBAR KIRI -->
    <div class="sidebar">
        <div class="profile">
            <div class="avatar"><?= $inisial ?></div>
            <div>
                <strong><?= $_SESSION['username'] ?></strong><br>
                <small>Admin</small>
            </div>
        </div>

        <nav>
            <a href="../dashboard/index.php" class="active">Dashboard</a>
            <a href="../tenant_aktif/index.php">Tenant Aktif</a>
            <a href="../tenant_kosong/index.php">Tenant Kosong</a>
            <a href="../pengajuan/index.php">Pengajuan & Negosiasi</a>
            <a href="../auth/logout.php">Logout</a>
        </nav>

    </div>

    <!-- KONTEN KANAN -->
    <div class="main">
        <h1>Dashboard</h1>
        <p>Ringkasan Kondisi Sewa Tenant</p>

        <div class="cards">
            <div class="card">
                <h2><?= $tenantAktif ?></h2>
                <p>Tenant Aktif</p>
            </div>

            <div class="card">
                <h2><?= $tenantKosong ?></h2>
                <p>Tenant Kosong</p>
            </div>

            <div class="card">
                <h2><?= $total_pn ?></h2>
                <p>Pengajuan & Negosiasi</p>
            </div>
        </div>
    </div>

</div>

</body>
</html>





