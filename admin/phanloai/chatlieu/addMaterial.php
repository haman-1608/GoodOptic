<?php
    include_once "../../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
        $matname = $_POST['m_name'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $matname)));
        $insert_mat = "INSERT INTO `Material` (`material_name`, `slug`, `status`) VALUES 
    ( '$matname', 
    '$slug', 
    'Active');";

    //thuc thi cau lenh
    mysqli_query($conn, $insert_mat);

    //tro ve trang 
    header("location: ../../index.php");  
    }  
?>