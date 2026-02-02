<?php
include "../config/koneksi.php";

$id = $_GET['id'];

// ambil data lama
$data = mysqli_query($koneksi, "SELECT * FROM tenant_aktif WHERE id='$id'");
$row  = mysqli_fetch_assoc($data);

// simpan hasil edit
if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama_tenant'];
    $jenis  = $_POST['jenis_usaha'];
    $lokasi = $_POST['lokasi'];

    mysqli_query($koneksi, "
        UPDATE tenant_aktif 
        SET 
            nama_tenant='$nama',
            jenis_usaha='$jenis',
            lokasi='$lokasi'
        WHERE id='$id'
    ");

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Tenant</title>
    <link rel="stylesheet" href="../assets/css/global.css">
</head>
<body>

<h2>Edit Tenant</h2>

<div class="form-box">
    <form method="post">
        <input type="text" name="nama_tenant" value="<?= $row['nama_tenant'] ?>" required>
        <input type="text" name="jenis_usaha" value="<?= $row['jenis_usaha'] ?>" required>
        <input type="text" name="lokasi" value="<?= $row['lokasi'] ?>" required>
        <button type="submit" name="simpan">Simpan Perubahan</button>
    </form>
</div>

</body>
</html>
