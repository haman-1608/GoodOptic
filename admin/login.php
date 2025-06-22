<?php
session_start();
$errorMsg = '';

// Nếu user submit form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dangnhap'])) {
    require_once('./config/dbconnect.php');
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $sql      = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
    $result   = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {
        // login thành công
        $_SESSION['user'] = mysqli_fetch_assoc($result);
        header('Location: index.php');
        exit;   // quan trọng: dừng kịch bản sau khi redirect
    } else {
        // login sai: gán thông báo lỗi
        $errorMsg = 'Email hoặc mật khẩu không đúng.';
    }
}

// Luôn load form (kể cả POST thất bại)
require_once('loginform.php');
