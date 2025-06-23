<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM admins where id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Người dùng đã được xóa thành công";
    }
    else{
        echo"Không thể xóa người dùng";
    }
    
?>