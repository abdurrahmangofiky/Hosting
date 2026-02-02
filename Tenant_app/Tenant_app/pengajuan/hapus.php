<?php
include "../config/koneksi.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM pengajuan_negosiasi WHERE id='$id'");
header("Location: index.php");
exit;