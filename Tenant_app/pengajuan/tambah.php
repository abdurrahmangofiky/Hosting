<?php
include "../config/koneksi.php";

if (isset($_POST['simpan'])) {
    $calon   = $_POST['calon_penyewa'];
    $jenis  = $_POST['jenis_usaha'];
    $status = $_POST['status'];

    mysqli_query($koneksi, "
        INSERT INTO pengajuan_negosiasi (calon_penyewa, jenis_usaha, status)
        VALUES ('$calon', '$jenis', '$status')
    ");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pengajuan & Negosiasi</title>

    <!-- PANGGIL CSS GLOBAL -->
     <link rel="stylesheet" href="../assets/css/global.css?v=1">
</head>
<body>

<h2>Tambah Pengajuan & Negosiasi</h2>

<div class="form-box">
    <form method="post">
        <input type="text" name="calon_penyewa" placeholder="Calon Penyewa" required>
        <input type="text" name="jenis_usaha" placeholder="Jenis Usaha" required>
        
        <button type="submit" name="simpan">Simpan</button>
    </form>
</div>


</body>
</html>
