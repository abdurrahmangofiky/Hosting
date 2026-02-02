<link rel="stylesheet" href="../assets/css/global.css">
<div class="bg">
   <div class="login-card">
        <img src="../assets/img/logo.png" class="logo">
        <h3 class="title">Login Sistem Informasi<br>Sewa Tenant</h3>
        <form action="proses_login.php" method="POST" autocomplete="off">
            <input type="text" name="nik" placeholder="Nomor Induk Karyawan" required>
            <input type="text" name="username" placeholder="Username" required>
            <div class="password-box">
                <input type="password" name="password" id="pass" placeholder="Password" required>
                <span class="eye" onclick="lihat()">👁</span>
            </div>
            <button>MASUK</button>
        </form>
    </div>
</div>
<script>
function lihat(){
    let p = document.getElementById("pass");
    p.type = p.type === "password" ? "text" : "password";
}
</script>