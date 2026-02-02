<?php
session_start();

// Tombol Keluar
if (isset($_POST['keluar'])) {
    session_unset();
    session_destroy();
    header("Location: ../auth/login_admin.php"); // ganti sesuai path login
    exit;
}

// Tombol Batal
if (isset($_POST['batal'])) {
    header("Location: ../dashboard/index.php"); // kembali ke dashboard
    exit;
}
?>

<!-- POPUP -->
<div class="logout-overlay">
    <div class="logout-card">
        <h2>Hai Admin!</h2>
        <p>“If you work really hard, and you're kind, amazing things will happen!”</p>

        <form method="POST">
            <button type="submit" name="batal" class="btn btn-batal">Batal</button>
            <button type="submit" name="keluar" class="btn btn-keluar">Keluar</button>
        </form>
    </div>
</div>

<style>
/* OVERLAY FULL SCREEN */
.logout-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.45); /* semi transparan hitam */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999; /* pastikan di atas dashboard */
}

/* CARD POPUP */
.logout-card {
    background: #fff;
    padding: 40px 30px;
    border-radius: 16px;
    max-width: 450px;
    text-align: center;
    box-shadow: 0 8px 25px rgba(0,0,0,0.25);
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from { transform: translateY(-30px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.logout-card h2 {
    margin-bottom: 15px;
    color: #333;
    font-size: 22px;
}

.logout-card p {
    font-size: 15px;
    color: #555;
    margin-bottom: 30px;
}

/* BUTTON */
.btn {
    padding: 12px 28px;
    border: none;
    border-radius: 12px;
    font-size: 15px;
    cursor: pointer;
    margin: 0 10px;
    color: #fff;
    text-decoration: none;
    transition: 0.3s;
}

.btn-batal {
    background: #1e60ff;
}
.btn-batal:hover { background: #1550cc; }

.btn-keluar {
    background: #e53935;
}
.btn-keluar:hover { background: #b71c1c; }
</style>
