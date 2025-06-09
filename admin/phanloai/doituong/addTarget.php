<?php
    include_once "../../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
        $tarname = $_POST['t_name'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $tarname)));
        $insert_tar = "INSERT INTO `targets` (`target_name`, `slug`, `status`) VALUES 
    ( '$tarname', 
    '$slug', 
    'Active');";

    //thuc thi cau lenh
    mysqli_query($conn, $insert_tar);

    //tro ve trang 
    header("location: ../../index.php");  
    }  
?>