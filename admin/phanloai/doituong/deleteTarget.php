<?php

    include_once "../../config/dbconnect.php";
    
    $t_id=$_POST['record'];
    $query="DELETE FROM targets where target_id='$t_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Đối tượng đã được xóa thành công";
    }
    else{
        echo"Lỗi khi xóa đối tượng";
    }
    
?>