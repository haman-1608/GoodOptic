<?php

    include_once "../../config/dbconnect.php";
    
    $uv_id=$_POST['record'];
    $query="DELETE FROM UV where uv_id='$uv_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"UV đã được xóa thành công";
    }
    else{
        echo"Lỗi khi xóa UV";
    }
    
?>