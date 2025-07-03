<?php
$limit = 12;

$page = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;

$offset = ($page - 1) * $limit;
$where = "WHERE category_id = 3 AND status = 'Active'";

// Filter chất liệu
if (!empty($_GET['material_id'])) {
    $material_id = (int)$_GET['material_id'];
    $where .= " AND Material_id = $material_id";
}

// Filter giá tiền
if (!empty($_GET['price_range'])) {
    list($min, $max) = explode('_', $_GET['price_range']);
    $where .= " AND disscounted_price BETWEEN $min AND $max";
}

// Đếm tổng sản phẩm sau khi lọc
$count_sql = "SELECT COUNT(*) AS total FROM products $where";
$count_result = mysqli_query($conn, $count_sql);
$total_row = mysqli_fetch_assoc($count_result);
$total_products = $total_row['total'];
$total_pages = ceil($total_products / $limit);

// Truy vấn sản phẩm có phân trang
$sql = "SELECT product_id, product_name, disscounted_price, images 
        FROM products 
        $where 
        LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);

?>
<div class="dmsp">
    <p style="margin: 20px;">Trang chủ > <b>Gọng kính</b></p>
    <h2 style="text-align: center;">Gọng Kính</h2>
    <form method="get">
        <input type="hidden" name="page" value="gongkinh">
        <div class="filter">
            <select class="filter1" name="material_id" onchange="this.form.submit()">
                <option value="">Chất liệu</option>
                <?php
                $m_query = mysqli_query($conn, "SELECT * FROM Material WHERE status='Active'");
                while ($m = mysqli_fetch_assoc($m_query)) {
                    $selected = (isset($_GET['material_id']) && $_GET['material_id'] == $m['material_id']) ? 'selected' : '';
                    echo "<option value='{$m['material_id']}' $selected>{$m['material_name']}</option>";
                }
                ?>
            </select>

            <select class="filter2" name="price_range" onchange="this.form.submit()">
                <option value="">Giá tiền</option>
                <option value="0_1000000" <?php if (isset($_GET['price_range']) && $_GET['price_range'] == '0_1000000') echo 'selected'; ?>>Dưới 1 triệu</option>
                <option value="1000000_2000000" <?php if (isset($_GET['price_range']) && $_GET['price_range'] == '1000000_2000000') echo 'selected'; ?>>1 - 2 triệu</option>
                <option value="2000000_4000000" <?php if (isset($_GET['price_range']) && $_GET['price_range'] == '2000000_4000000') echo 'selected'; ?>>2 - 4 triệu</option>
                <option value="4000000_999999999" <?php if (isset($_GET['price_range']) && $_GET['price_range'] == '4000000_999999999') echo 'selected'; ?>>Trên 4 triệu</option>
            </select>
        </div>
    </form>

    <div class="gongkinh">
        <?php
        while ($row = mysqli_fetch_assoc($result)):
        ?>

            <a href="index.php?page=chitiet&id=<?php echo $row['product_id']; ?>" class="sp">
                <div class="ndsp">
                    <div class="anhsp">
                        <?php
                        $firstImage = $row['images'];

                        if (preg_match('#^https?://#i', $firstImage)) {
                            // Là URL tuyệt đối
                            $imgSrc = $firstImage;
                        } else {
                            // Là tên file ảnh được upload, kiểm tra file tồn tại
                            $localPath = 'imgs/products/' . $firstImage;
                            if (file_exists($localPath)) {
                                $imgSrc = $localPath;
                            } else {
                                $imgSrc = 'imgs/products/default.jpg'; // fallback ảnh mặc định nếu file không tồn tại
                            }
                        }
                        ?>
                        <img src="<?php echo $imgSrc; ?>" alt="Ảnh sản phẩm" loading="lazy">
                    </div>
                    <p class="tensp"><?php echo htmlspecialchars($row['product_name']); ?></p>
                    <p class="gia" style="margin-left: 10px; margin-top:0px;"><?php echo number_format($row['disscounted_price'], 0, ',', '.') . ' đ'; ?></p>
                </div>
            </a>
        <?php endwhile; ?>
    </div>

    <div class="pagination" style="text-align: center; margin-top: 20px;">
        <?php

        if ($page > 1) {
            $query_params['page_num'] = $page - 1;
            echo '<a href="?' . http_build_query($query_params) . '" class="arrow">‹</a>';
        }

        // Hiển thị tất cả các trang
        // Lấy các tham số lọc để gắn vào link phân trang
        $query_params = $_GET;
        unset($query_params['page_num']); // bỏ page_num cũ

        for ($i = 1; $i <= $total_pages; $i++) {
            $query_params['page_num'] = $i;
            $query_string = http_build_query($query_params);

            if ($i == $page) {
                echo '<span class="current">' . $i . '</span>';
            } else {
                echo '<a href="?' . $query_string . '">' . $i . '</a>';
            }
        }


        // Nút "›" tiến tới nếu không phải trang cuối
        if ($page < $total_pages) {
            $query_params['page_num'] = $page + 1;
            echo '<a href="?' . http_build_query($query_params) . '" class="arrow">›</a>';
        }
        ?>
    </div>
</div>