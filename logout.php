<?php
session_start(); // Memulai sesi
session_destroy(); // Menghancurkan semua data sesi

// Redirect ke halaman login atau halaman lain setelah logout
header("Location: Login.html"); // Ganti dengan halaman yang ingin dituju setelah logout
exit();
?>