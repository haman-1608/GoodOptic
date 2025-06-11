<?php

    include_once "../../config/dbconnect.php";
    
    $m_id=$_POST['record'];
    $query="DELETE FROM Material where material_id='$m_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Chất liệu đã được xóa thành công";
    }
    else{
        echo"Lỗi khi xóa chất liệu";
    }
    
?>