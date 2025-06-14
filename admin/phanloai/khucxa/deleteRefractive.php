<?php

    include_once "../../config/dbconnect.php";
    
    $r_id=$_POST['record'];
    $query="DELETE FROM Refractive where refractive_id='$r_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Khúc xạ đã được xóa thành công";
    }
    else{
        echo"Lỗi khi xóa";
    }
    
?>