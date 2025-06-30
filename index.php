<?php
    session_start();
    // unset($_SESSION['cart']);
   include_once "admin/config/dbconnect.php";
//    if(!isset($_COOKIE['customer_id'])){
//         $randomName = "Khách hàng";
//         $randomEmail = uniqid().'@gmail.com';
//         $randomPhone = '0000000000';
//         $randomAddress = 'Chưa có';

//         $stmt = mysqli_prepare($conn, "INSERT INTO customers (customer_name, email, phone, address) VALUES (?,?,?,?)");
//         mysqli_stmt_bind_param( $stmt, 'ssss',$randomName, $randomEmail, $randomPhone, $randomAddress);
//         mysqli_stmt_execute($stmt);
//         $customer_id = mysqli_insert_id($conn);
//         setcookie("customer_id", $customer_id, time() + (86400 * 30)); // thời gian sống 30 ngày
//         mysqli_stmt_close($stmt);
//     }
//     else{
//         $customer_id = intval($_COOKIE['customer_id']);
//     }
    if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
    if(isset($_POST['add_to_cart'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $imgs = $_POST['imgs'];
        $quantity = intval($_POST['quantity']);
        
        $check = false;

        foreach ($_SESSION['cart'] as $index => $sp) {
            if ($sp['id'] == $id) {
                $_SESSION['cart'][$index]['quantity'] += $quantity;
                $check = true;
                break;
            }
        }
    
        if(!$check){
            $sp = array(
                'id' => $id, 
                'name' => $name, 
                'price' => $price, 
                'imgs' => $imgs, 
                'quantity' => $quantity);
            $_SESSION['cart'][] = $sp;
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/trangchu.css">
    <link rel="stylesheet" type="text/css" href="css/danhmucsp.css">
    <link rel="stylesheet" type="text/css" href="css/gtvalh.css">
    <link rel="stylesheet" type="text/css" href="css/chitiet.css">
    <link rel="stylesheet" type="text/css" href="css/giohang.css">
    <link rel="icon" type="image/png" href="imgs/Logo1.png">
    <script src="jquery-3.7.1.js"></script> <!-- dẫn jquery -->
    <title>Good Optic - Nhìn rõ hôm nay, tự tin ngày mai</title>
</head>
<body>
    
    <?php
        include("components/header.php");?>
        
        <main>
            <?php
                $page = $_GET['page'] ?? 'trangchu';
                $file = "pages/{$page}.php";
                if (file_exists($file)) {
                    include($file);
            } 
                else {
                    include("pages/trangchu.php"); // fallback nếu không tồn tại
            }
            ?>
        </main>

    <?php
        include("components/footer.php");
    ?>
</body>
</html>
 