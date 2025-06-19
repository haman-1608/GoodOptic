<?php include "./header.php"; ?>
<?php include "./sidebar.php"; ?>
<div>
  <h2 class="text-center">Danh sách sản phẩm</h2>
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

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Product
  </button>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Thêm mới sản phẩm</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form enctype='multipart/form-data' action="sanpham/addItemController.php" method="POST">
            <div class="form-group">
              <label for="p_name">Tên sản phẩm:</label>
              <input type="text" class="form-control" name="p_name" required>
            </div>
            <div class="form-group">
              <label for="p_price">Giá bán:</label>
              <input type="text" class="form-control" name="p_price" required>
            </div>
            <div class="form-group">
              <label for="unit">Đơn vị:</label>
              <input type="text" class="form-control" name="unit" required>
            </div>
            <div class="form-group">
              <label for="p_desc">Mô tả:</label>
              <input type="text" class="form-control" name="p_desc" required>
            </div>
            <div class="form-group">
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
            </div>
            <div class="form-group">
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
            </div>
            <div class="form-group">
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
            </div>
            <div class="form-group">
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
            </div>
            <div class="form-group">
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
            </div>
            <div class="form-group">
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
            </div>
            <div class="form-group">
              <label for="file">Chọn ảnh:</label>
              <input type="file" class="form-control-file" name="file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Thêm</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Đóng</button>
        </div>
      </div>

    </div>
  </div>


</div>
<?php include "./footer.php"; ?>