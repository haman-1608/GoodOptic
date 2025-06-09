<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
        $ProductName = $_POST['p_name'];
        $desc= $_POST['p_desc'];
        $price = $_POST['p_price'];
        $unit = $_POST['unit'];
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        $target = $_POST['target'];
        $uv = $_POST['uv'];
        $refractive = $_POST['refractive'];
        $material = $_POST['material'];
        $status = $_POST['p_status'];

        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
    
        $location="./uploads/";
        $image=$location.$name;

        $target_dir="../uploads/";
        $finalImage=$target_dir.$name;

        move_uploaded_file($temp,$finalImage);

         $insert = mysqli_query($conn,"INSERT INTO products
         (product_name,images,price,desc,category_id,brand_id,unit,target_id,UV_id,Refractive_id,Material_id,status) 
         VALUES ('$ProductName','$image',$price,'$desc','$category','$brand','$unit','$target','$uv','$refractive','$material','$status')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
             echo "Sản phẩm đã được thêm thành công";
         }
     
    }
        
?>