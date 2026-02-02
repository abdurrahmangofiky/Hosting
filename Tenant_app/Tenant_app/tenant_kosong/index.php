<?php
session_start();
include "../config/koneksi.php";

// SIMULASI SESSION
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'admin';
}

$inisial = strtoupper(substr($_SESSION['username'], 0, 1));

// AMBIL DATA
$data  = mysqli_query($koneksi, "SELECT * FROM tenant_kosong ORDER BY id DESC");
$total = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tenant Kosong</title>
<link rel="stylesheet" href="../assets/css/global.css">

<style>
/* ===== TABEL BERSIH & RAPI ===== */
.table-pn {
    width: 100%;
    border-collapse: collapse;
}

.table-pn th {
    background: #f3f4f6;
    text-align: left;          /* PENTING */
    padding: 14px;
    font-weight: 600;
    color: #333;
}

.table-pn td {
    padding: 14px;
    border-bottom: 1px solid #eee;
    vertical-align: middle;
}

/* STATUS */
.status {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 500;
    display: inline-block;
}

.status.menunggu-persetujuan {
    background: #fff3cd;
    color: #856404;
}

.status.dalam-negosiasi {
    background: #d1ecf1;
    color: #0c5460;
}

.status.disetujui {
    background: #d4edda;
    color: #155724;
}

.status.ditolak {
    background: #f8d7da;
    color: #721c24;
}

/* AKSI */
.aksi {
    white-space: nowrap;
}

.btn-edit {
    color: #1e60ff;
    text-decoration: none;
    font-weight: 500;
}

.btn-hapus {
    color: #e53935;
    text-decoration: none;
    font-weight: 500;
}
</style>
</head>

<body>

<div class="container">

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="profile">
        <div class="avatar"><?= $inisial ?></div>
        <div>
            <strong><?= $_SESSION['username'] ?></strong><br>
            <small>Admin</small>
        </div>
    </div>

    <nav>
        <a href="../dashboard/index.php">Dashboard</a>
        <a href="../tenant_aktif/index.php">Tenant Aktif</a>
        <a href="../tenant_kosong/index.php" class="active">Tenant Kosong</a>
        <a href="../pengajuan/index.php">Pengajuan & Negosiasi</a>
        <a href="../auth/logout.php">Logout</a>
    </nav>
</div>

<!-- KONTEN -->
<div class="main">

<!-- HEADER -->
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:30px;">
    <div>
        <h1>Tenant Kosong</h1>
        <p>Daftar unit tenant kosong yang tersedia untuk disewakan</p>
    </div>

    <div>
        <a href="tambah.php" style="
            background:#1e60ff;
            color:#fff;
            padding:10px 16px;
            border-radius:8px;
            text-decoration:none;
            margin-right:10px;
        ">
            Total: <?= $total ?>
        </a>

        <a href="tambah.php" style="
            background:#1e60ff;
            color:#fff;
            padding:10px 16px;
            border-radius:8px;
            text-decoration:none;
        ">
            +New Tenant Kosong
        </a>
    </div>
</div>

<!-- TABEL -->
<div style="background:#fff; padding:25px; border-radius:14px;">
<table class="table-pn">
<thead>
<tr>
    <th>Lokasi</th>
    <th>Status</th>
    <th>Lebih Detail</th>
    <th>Aksi</th>
</tr>
</thead>


        
        <tbody>
<?php if ($total > 0): ?>
    <?php while ($row = mysqli_fetch_assoc($data)): ?>
        <tr>
            <!-- LOKASI -->
            <td><?= $row['lokasi'] ?></td>

            <!-- STATUS -->
            
                 <td>
        <form action="update_status.php" method="post">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <select name="status" onchange="this.form.submit()">
                <option value="">-- Pilih Status --</option>
                <option value="Kosong"
                    <?= $row['status']=='Kosong'?'selected':'' ?>>
                    Kosong
                </option>
                <option value="Dalam Negosiasi"
                    <?= $row['status']=='Dalam Negosiasi'?'selected':'' ?>>
                    Dalam Negosiasi
                </option>
            </select>
        </form>
    </td>

            

            <!-- LEBIH DETAIL -->
            <td>
                <a href="detail.php?id=<?= $row['id'] ?>" style="color:#1e60ff; text-decoration:none;">
                    Lihat
                </a>
            </td>

            <!-- AKSI -->
            <td class="aksi">
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a> |
                <a href="hapus.php?id=<?= $row['id'] ?>" class="btn-hapus"
                   onclick="return confirm('Yakin ingin menghapus?')">
                   Hapus
                </a>
            </td>

        </tr>
    <?php endwhile; ?>
<?php else: ?>
    <tr>
        <td colspan="4" style="text-align:center; padding:20px;">
            Belum ada tenant kosong
        </td>
    </tr>
<?php endif; ?>
</tbody>


    </table>
</div>





