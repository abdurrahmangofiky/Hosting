<?php
include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM pengajuan_negosiasi WHERE id='$id'");
$row  = mysqli_fetch_assoc($data);

if (isset($_POST['simpan'])) {
    $calon = $_POST['calon_penyewa'];
    $jenis = $_POST['jenis_usaha'];
    

    mysqli_query($koneksi, "
        UPDATE pengajuan_negosiasi SET
            calon_penyewa = '$calon',
            jenis_usaha   = '$jenis'
        WHERE id = '$id'
    ");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengajuan</title>
    <link rel="stylesheet" href="../assets/css/global.css">
</head>
<body>

<div class="form-wrapper">
    <h2>Edit Pengajuan</h2>

    <form method="post" class="form-box">
        <div class="form-group">
            <label>Calon Penyewa</label>
            <input type="text" name="calon_penyewa"
                   value="<?= $row['calon_penyewa'] ?>" required>
        </div>

        <div class="form-group">
            <label>Jenis Usaha</label>
            <input type="text" name="jenis_usaha"
                   value="<?= $row['jenis_usaha'] ?>" required>
        </div>

        <button type="submit" name="simpan" class="btn-primary">
            Simpan Perubahan
        </button>
    </form>
</div>

</body>
</html>
