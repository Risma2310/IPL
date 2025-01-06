<?php
session_start();
$host = 'localhost'; // Ganti dengan host database Anda
$db = 'travela'; // Ganti dengan nama database Anda
$user = 'root'; // Ganti dengan username database Anda
$pass = ''; // Ganti dengan password database Anda

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cek apakah data ada di $_POST
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query untuk memeriksa username dan password
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Login berhasil
            $_SESSION['username'] = $username;
            header("Location: index.html"); // Ganti dengan halaman yang ingin dituju setelah login
            exit();
        } else {
            echo "Username atau password salah!";
        }
    } else {
        echo "Data tidak lengkap!";
    }
}

$conn->close();
?>