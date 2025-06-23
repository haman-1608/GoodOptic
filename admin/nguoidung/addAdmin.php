<?php
include_once "../config/dbconnect.php";

if (isset($_POST['upload'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $userPassword = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $type = $_POST['type'];

    $insert = mysqli_query($conn, "INSERT INTO admins
         (name,email,password,phone,address,type,status,created_at,updated_at) 
         VALUES ('$name','$email','$userPassword','$phone','$address','$type','Active', NOW(), NOW())");
    
    
    if (!$insert) {
        echo mysqli_error($conn);
    } else {
        echo "Người dùng đã được thêm thành công";
        header("Location: ../viewUsers.php");
    }
}