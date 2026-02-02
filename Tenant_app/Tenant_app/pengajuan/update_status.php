<?php
include "../config/koneksi.php";

if (isset($_POST['id']) && isset($_POST['status'])) {

    $id     = $_POST['id'];
    $status = $_POST['status'];

    mysqli_query(
        $koneksi,
        "UPDATE pengajuan_negosiasi 
         SET status='$status' 
         WHERE id='$id'"
    );
}

// BALIK KE INDEX
header("Location: index.php");
exit;
