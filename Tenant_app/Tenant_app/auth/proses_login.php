<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
if ($username == "admin" && $password == "123") {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $username;
    header("Location: ../dashboard/index.php");
    exit;
} else {
    echo "Login gagal";
}
?>