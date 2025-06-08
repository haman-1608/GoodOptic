 
<div class="container p-5">

<h4>Chỉnh sửa sản phẩm</h4>
<?php
    include_once "../config/dbconnect.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * FROM products WHERE product_id='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
      $catID=$row1["category_id"];
      $brandID=$row1["brand_id"];
      $refID=$row1["Refractive_id"];
      $uvID=$row1["UV_id"];
      $targetID=$row1["target_id"];
?>
<form id="update-Items" onsubmit="updateItems()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" class="form-control" id="product_id" value="<?=$row1['product_id']?>" hidden>
    </div>
    <div class="form-group">
      <label for="name">Tên sản phẩm:</label>
      <input type="text" class="form-control" id="p_name" value="<?=$row1['product_name']?>">
    </div>
    <div class="form-group">
      <label for="desc">Mô tả:</label>
      <input type="text" class="form-control" id="p_desc" value="<?=$row1['desc']?>">
    </div>
    <div class="form-group">
      <label for="price">Giá bán :</label>
      <input type="number" class="form-control" id="p_price" value="<?=$row1['price']?>">
    </div>
    <div class="form-group">
      <label>Loại sản phẩm:</label>
      <select id="category">
        <?php
          $sql="SELECT * from categories WHERE category_id='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['category_name'] ."</option>";
            }
          }
        ?>
        <?php
          $sql="SELECT * from categories WHERE category_id!='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['category_name'] ."</option>";
            }
          }
        ?>
      </select>
      
    </div>

    <div class="form-group">
      <label>Thương hiệu:</label>
      <select id="brand">
        <?php
          $sql="SELECT * from brands WHERE brand_id='$brandID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['brand_id'] ."'>" .$row['brand_name'] ."</option>";
            }
          }
        ?>
        <?php
          $sql="SELECT * from brands WHERE brand_id!='$brandID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['brand_id'] ."'>" .$row['brand_name'] ."</option>";
            }
          }
        ?>
      </select>
      
    </div>
    <div class="form-group">
      <label>Khúc xạ:</label>
      <select id="refractive">
        <?php
          $sql="SELECT * from Refractive WHERE refractive_id='$refID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['refractive_id'] ."'>" .$row['refractive_name'] ."</option>";
            }
          }
        ?>
        <?php
          $sql="SELECT * from Refractive WHERE refractive_id!='$refID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['refractive_id'] ."'>" .$row['refractive_name'] ."</option>";
            }
          }
        ?>
      </select>
      
    </div>
    <div class="form-group">
      <label>Chống tia UV:</label>
      <select id="uv">
        <?php
          $sql="SELECT * from UV WHERE uv_id='$uvID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['uv_id'] ."'>" .$row['uv_name'] ."</option>";
            }
          }
        ?>
        <?php
          $sql="SELECT * from UV WHERE uv_id!='$uvID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['uv_id'] ."'>" .$row['uv_name'] ."</option>";
            }
          }
        ?>
      </select>
      
    </div>
    <div class="form-group">
      <label>Đối tượng:</label>
      <select id="target">
        <?php
          $sql="SELECT * from targets WHERE target_id='$targetID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['target_id'] ."'>" .$row['target_name'] ."</option>";
            }
          }
        ?>
        <?php
          $sql="SELECT * from targets WHERE target_id!='$targetID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['target_id'] ."'>" .$row['target_name'] ."</option>";
            }
          }
        ?>
      </select>
      
    </div>
         <div class="form-group">
            <label for="file">Chọn hình ảnh:</label>
            <input type="text" id="existingImage" class="form-control" value="<?=$row1['images']?>" hidden>
            <input type="file" id="newImage" value="">
         </div>
    </div>
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary">Update Item</button>
    </div>
    <?php
    		}
    	}
    ?>
  </form>

    </div>