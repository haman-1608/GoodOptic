<?php
    include_once "../config/dbconnect.php";

    $product_id=$_POST['product_id'];
    $p_name= $_POST['p_name'];
    $p_desc= $_POST['p_desc'];
    $p_price= $_POST['p_price'];
    $category= $_POST['category'];
    $brand= $_POST['brand'];
    $refractive= $_POST['refractive'];
    $target= $_POST['target'];
    $uv= $_POST['uv'];
    $material= $_POST['material'];
    if( isset($_FILES['newImage']) ){
        
        $location="./uploads/";
        $img = $_FILES['newImage']['name'];
        $tmp = $_FILES['newImage']['tmp_name'];
        $dir = '../uploads/';
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','webp');
        $image =rand(1000,1000000).".".$ext;
        $final_image=$location. $image;
        if (in_array($ext, $valid_extensions)) {
            $path = UPLOAD_PATH . $image;
            move_uploaded_file($tmp, $dir.$image);
        }
    }else{
        $final_image=$_POST['existingImage'];
    }
    $updateItem = mysqli_query($conn,"UPDATE products SET 
        product_name='$p_name', 
        desc='$p_desc', 
        price=$p_price,
        category_id=$category,
        brand_id='$brand',
        refractive_id='$refractive',
        target_id='$target',
        uv_id='$uv',
        material_id='$material',
        images='$final_image' 
        WHERE product_id=$product_id");


    if($updateItem)
    {
        echo "true";
    }
    // else
    // {
    //     echo mysqli_error($conn);
    // }
?>