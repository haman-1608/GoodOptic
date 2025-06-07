<?php

    include_once "../config/dbconnect.php";
    
    $p_id=$_POST['record'];
    $query="DELETE FROM products where product_id='$p_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Sản phẩm đã được xóa thành công";
    }
    else{
        echo"Không thể xóa sản phẩm";
    }
    
?>