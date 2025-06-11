<?php
    include_once "../../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
        $refname = $_POST['r_name'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $refname)));
        $insert_ref = "INSERT INTO `Refractive` (`refractive_name`, `slug`, `status`) VALUES 
    ( '$refname', 
    '$slug', 
    'Active');";

    //thuc thi cau lenh
    mysqli_query($conn, $insert_ref);

    //tro ve trang 
    header("location: ../../index.php");  
    }  
?>