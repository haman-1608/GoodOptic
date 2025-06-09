<?php

    include_once "../../config/dbconnect.php";
    
    $c_id=$_POST['record'];
    $query="DELETE FROM categories where category_id='$c_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Loại sản phẩm đã được xóa thành công";
    }
    else{
        echo"Lỗi khi xóa loại sản phẩm";
    }
    
?>