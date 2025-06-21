<?php include "./header.php"; ?>
<?php include "./sidebar.php"; ?>
<div>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Mã sản phẩm</th>
        <th class="text-center">Hình ảnh</th>
        <th class="text-center">Tên sản phẩm</th>
        <th class="text-center">Mô tả</th>
        <th class="text-center">Loại</th>
        <th class="text-center">Thương hiệu</th>
        <th class="text-center">Đối tượng</th>
        <th class="text-center">Chống tia UV</th>
        <th class="text-center">Khúc xạ</th>
        <th class="text-center">Chất liệu</th>
        <th class="text-center">Giá</th>
        <th class="text-center">Đơn vị</th>
        <th class="text-center" colspan="2">Hành động</th>
      </tr>
    </thead>
    <?php
    include_once "./config/dbconnect.php";
    $sql = "SELECT * from products, categories, brands, targets, UV, Refractive, Material
      WHERE products.category_id=categories.category_id 
      AND products.brand_id=brands.brand_id 
      AND products.target_id=targets.target_id
      AND products.UV_id=UV.uv_id
      AND products.Refractive_id=Refractive.refractive_id
      AND products.Material_id=Material.material_id";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
          <td><?= $count ?></td>
          <td><img height='100px' src="../imgs/products/<?php echo $row['images'] ?>"></td>
          <td><?= $row["product_name"] ?></td>
          <td><?= $row["description"] ?></td>
          <td><?= $row["category_name"] ?></td>
          <td><?= $row["brand_name"] ?></td>
          <td><?= $row["target_name"] ?></td>
          <td><?= $row["uv_name"] ?></td>
          <td><?= $row["refractive_name"] ?></td>
          <td><?= $row["material_name"] ?></td>
          <td><?= $row["price"] ?></td>
          <td><?= $row["unit"] ?></td>
          <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?= $row['product_id'] ?>')">Edit</button></td>
          <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?= $row['product_id'] ?>')">Delete</button></td>
        </tr>
    <?php
        $count = $count + 1;
      }
    }
    ?>
  </table>

  <div class="box">
		<a class="button" href="#divOne">Thêm mới</a>
	</div>
	<div class="overlay" id="divOne">
		<div id="myModalwrapper" class="modal-wrapper">
			<h2>Thêm mới sản phẩm</h2><a class="close" href="#">&times;</a>
			<div class="content">
				<div class="modal">
					<form enctype='multipart/form-data' action="sanpham/addItemController.php" method="POST">
						<label for="p_name">Tên sản phẩm:</label>
              <input type="text" class="form-control" name="p_name" required>
						<label for="p_price">Giá bán:</label>
              <input type="text" class="form-control" name="p_price" required>
            <label for="unit">Đơn vị:</label>
              <input type="text" class="form-control" name="unit" required>
            <label for="p_desc">Mô tả:</label>
            <textarea name="p_desc" id=""></textarea>
            <label for="category">Phân loại:</label>
              <select name="category">
                <option disabled selected>Chọn</option>
                <?php

                $sql = "SELECT * from categories";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                  }
                }
                ?>
              </select>
            <label for="brand">Thương hiệu:</label>
              <select name="brand">
                <option disabled selected>Chọn</option>
                <?php

                $sql = "SELECT * from brands";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['brand_id'] . "'>" . $row['brand_name'] . "</option>";
                  }
                }
                ?>
              </select>
            <label for="target">Đối tượng:</label>
              <select name="target">
                <option disabled selected>Chọn</option>
                <?php

                $sql = "SELECT * from targets";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['target_id'] . "'>" . $row['target_name'] . "</option>";
                  }
                }
                ?>
              </select>
            <label for="uv">Chống tia UV:</label>
              <select name="uv">
                <option disabled selected>Chọn</option>
                <?php

                $sql = "SELECT * from UV";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['uv_id'] . "'>" . $row['uv_name'] . "</option>";
                  }
                }
                ?>
              </select>
            <label for="refractive">Khúc xạ:</label>
              <select name="refractive">
                <option disabled selected>Chọn</option>
                <?php

                $sql = "SELECT * from Refractive";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['refractive_id'] . "'>" . $row['refractive_name'] . "</option>";
                  }
                }
                ?>
              </select>
            <label for="material">Chất liệu:</label>
              <select name="material">
                <option disabled selected>Chọn</option>
                <?php

                $sql = "SELECT * from Material";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['material_id'] . "'>" . $row['material_name'] . "</option>";
                  }
                }
                ?>
              </select>
            <label for="">Chọn ảnh:</label>
              <input type="file" class="form-control-file" name="image">
            <input type="submit" value="Submit" name="upload">
					</form>
				</div>
			</div>
		</div>
	</div>
<?php include "./footer.php"; ?>