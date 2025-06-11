<?php
    $conn = new mysqli("localhost", "root","","goodoptic");
    $conn->set_charset("utf8");

    if($conn->connect_error){
        die("Kết nối thất bại: ". $conn->connect_error);
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
 