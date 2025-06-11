<?php
    include_once "../../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
        $uvname = $_POST['uv_name'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $uvname)));
        $insert_uv = "INSERT INTO `UV` (`uv_name`, `slug`, `status`) VALUES 
    ( '$uvname', 
    '$slug', 
    'Active');";

    //thuc thi cau lenh
    mysqli_query($conn, $insert_uv);

    //tro ve trang 
    header("location: ../../index.php");  
    }  
?>