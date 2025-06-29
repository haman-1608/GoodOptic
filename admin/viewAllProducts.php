<?php include "./header.php"; ?>
<?php include "./sidebar.php"; ?>
<?php include_once "./config/dbconnect.php"; ?>
<main>
  <form method="get" action="" class="filter-bar">
    <!-- ===== ô tìm theo ID ===== -->
    <input
      type="text"
      name="product_id"
      placeholder="Tìm theo Mã SP"
      value="<?= htmlspecialchars($_GET['product_id'] ?? '') ?>"
      style="width:120px; margin-right:8px;">

    <select name="category_id">
      <option value="">-- Loại sản phẩm --</option>
      <?php
      $sql = "SELECT * FROM categories";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        $selected = ($_GET['category_id'] ?? '') == $row['category_id'] ? 'selected' : '';
        echo "<option value='{$row['category_id']}' $selected>{$row['category_name']}</option>";
      }
      ?>
    </select>

    <select name="brand_id">
      <option value="">-- Thương hiệu --</option>
      <?php
      $sql = "SELECT * FROM brands";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        $selected = ($_GET['brand_id'] ?? '') == $row['brand_id'] ? 'selected' : '';
        echo "<option value='{$row['brand_id']}' $selected>{$row['brand_name']}</option>";
      }
      ?>
    </select>

    <select name="target_id">
      <option value="">-- Đối tượng --</option>
      <?php
      $sql = "SELECT * FROM targets";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        $selected = ($_GET['target_id'] ?? '') == $row['target_id'] ? 'selected' : '';
        echo "<option value='{$row['target_id']}' $selected>{$row['target_name']}</option>";
      }
      ?>
    </select>

    <select name="uv_id">
      <option value="">-- Tia UV --</option>
      <?php
      $sql = "SELECT * FROM UV";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        $selected = ($_GET['uv_id'] ?? '') == $row['uv_id'] ? 'selected' : '';
        echo "<option value='{$row['uv_id']}' $selected>{$row['uv_name']}</option>";
      }
      ?>
    </select>

    <select name="refractive_id">
      <option value="">-- Bệnh khúc xạ --</option>
      <?php
      $sql = "SELECT * FROM Refractive";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        $selected = ($_GET['refractive_id'] ?? '') == $row['refractive_id'] ? 'selected' : '';
        echo "<option value='{$row['refractive_id']}' $selected>{$row['refractive_name']}</option>";
      }
      ?>
    </select>

    <select name="material_id">
      <option value="">-- Chất liệu --</option>
      <?php
      $sql = "SELECT * FROM Material";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        $selected = ($_GET['material_id'] ?? '') == $row['material_id'] ? 'selected' : '';
        echo "<option value='{$row['material_id']}' $selected>{$row['material_name']}</option>";
      }
      ?>
    </select>

    <input type="submit" value="Lọc">
  </form>

  <hr>

  <table class="table">
    <thead>
      <tr>
        <th>Mã sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Mô tả</th>
        <th>Loại</th>
        <th>Thương hiệu</th>
        <th>Đối tượng</th>
        <th>Chống tia UV</th>
        <th>Khúc xạ</th>
        <th>Chất liệu</th>
        <th>Giá</th>
        <th>Đơn vị</th>
        <th colspan="2">Hành động</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include_once "./config/dbconnect.php";

      $sql = "SELECT * FROM products 
              JOIN categories ON products.category_id = categories.category_id
              JOIN brands ON products.brand_id = brands.brand_id
              JOIN targets ON products.target_id = targets.target_id
              JOIN UV ON products.UV_id = UV.uv_id
              JOIN Refractive ON products.Refractive_id = Refractive.refractive_id
              JOIN Material ON products.Material_id = Material.material_id";

      $where = [];
      if (!empty($_GET['product_id'])) {
        $pid = intval($_GET['product_id']);
        $where[] = "products.product_id = '$pid'";
      }

      if (!empty($_GET['category_id'])) {
        $where[] = "products.category_id = '" . $_GET['category_id'] . "'";
      }
      if (!empty($_GET['brand_id'])) {
        $where[] = "products.brand_id = '" . $_GET['brand_id'] . "'";
      }
      if (!empty($_GET['target_id'])) {
        $where[] = "products.target_id = '" . $_GET['target_id'] . "'";
      }
      if (!empty($_GET['uv_id'])) {
        $where[] = "products.UV_id = '" . $_GET['uv_id'] . "'";
      }
      if (!empty($_GET['refractive_id'])) {
        $where[] = "products.Refractive_id = '" . $_GET['refractive_id'] . "'";
      }
      if (!empty($_GET['material_id'])) {
        $where[] = "products.Material_id = '" . $_GET['material_id'] . "'";
      }

      if (count($where) > 0) {
        $sql .= " WHERE " . implode(" AND ", $where);
      }

      $result = $conn->query($sql);
      $count = 1;

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $image = $row['images'];
          $src = (preg_match('#^https?://#i', $image))
            ? $image
            : "../imgs/products/{$image}";

      ?>
          <tr>
            <td><?= htmlspecialchars($row['product_id']) ?></td>
            <td><img src="<?= htmlspecialchars($src) ?>" height="80px"></td>
            <td><?= htmlspecialchars($row["product_name"]) ?></td>
            <td><?= htmlspecialchars($row["description"]) ?></td>
            <td><?= $row["category_name"] ?></td>
            <td><?= $row["brand_name"] ?></td>
            <td><?= $row["target_name"] ?></td>
            <td><?= $row["uv_name"] ?></td>
            <td><?= $row["refractive_name"] ?></td>
            <td><?= $row["material_name"] ?></td>
            <td><?= $row["price"] ?></td>
            <td><?= $row["unit"] ?></td>
            <td><a class="btn-edit" href="editProduct.php?id=<?= $row['product_id'] ?>">Sửa</a></td>
            <td><a class="btn-delete" href="sanpham/deleteItemController.php?id=<?= $row['product_id'] ?>" onclick="return confirm('Bạn chắc chắn xóa mục này?');">Xóa</a></td>
          </tr>
      <?php
        }
      } else {
        echo '<tr><td colspan="14" style="text-align:center;">Không tìm thấy sản phẩm phù hợp</td></tr>';
      }
      ?>
    </tbody>
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
            <input type="submit" value="Thêm" name="upload">
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include "./footer.php"; ?>