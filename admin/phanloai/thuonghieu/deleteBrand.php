<?php

    include_once "../../config/dbconnect.php";
    
    $b_id=$_POST['record'];
    $query="DELETE FROM brands where brand_id='$b_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Thuơng hiệu đã được xóa thành công";
    }
    else{
        echo"Lỗi khi xóa thương hiệu: ";
    }
    
?>