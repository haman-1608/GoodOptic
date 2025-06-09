<?php
    include_once "../../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
        $catname = $_POST['c_name'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $catname)));
        $insert = "INSERT INTO `categories` (`category_name`, `slug`, `category_status`) VALUES 
    ( '$catname', 
    '$slug', 
    'Active');";

    //thuc thi cau lenh
    mysqli_query($conn, $insert);

    //tro ve trang 
    header("location: ../../index.php");  
    }  
?>