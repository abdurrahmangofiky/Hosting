<?php
include "../config/koneksi.php";

if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama_tenant'];
    $jenis  = $_POST['jenis_usaha'];
    $lokasi = $_POST['lokasi'];

    mysqli_query($koneksi, "
        INSERT INTO tenant_aktif (nama_tenant, jenis_usaha, lokasi)
        VALUES ('$nama', '$jenis', '$lokasi')
    ");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tenant</title>

    <!-- PANGGIL CSS GLOBAL -->
     <link rel="stylesheet" href="../assets/css/global.css?v=1">
</head>
<body>

<h2>Tambah Tenant Aktif</h2>

<div class="form-box">
    <form method="post">
        <input type="text" name="nama_tenant" placeholder="Nama Tenant" required>
        <input type="text" name="jenis_usaha" placeholder="Jenis Usaha" required>
        <input type="text" name="lokasi" placeholder="Lokasi" required>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</div>


</body>
</html>
