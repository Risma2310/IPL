<?php
$host = 'localhost'; // Ganti dengan host database Anda
$db = 'travela'; // Ganti dengan nama database Anda
$user = 'root'; // Ganti dengan username database Anda
$pass = ''; // Ganti dengan password database Anda

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek apakah data ada di $_POST
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Pastikan username dan email unik
    $checkUser  = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = $conn->query($checkUser );

    if ($result->num_rows > 0) {
        echo "Username atau email sudah terdaftar!";
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            // Redirect ke halaman login dengan parameter query string
            header("Location: login.html?message=success");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "Data tidak lengkap!";
}

$conn->close();
?>