<?php
$limit = 12;
$page = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
$offset = ($page - 1) * $limit;

$where = "WHERE category_id = 1 AND status = 'Active'";

// Bộ lọc chất liệu
if (!empty($_GET['material_id'])) {
    $material_id = (int)$_GET['material_id'];
    $where .= " AND Material_id = $material_id";
}

// Bộ lọc giá tiền
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

// Truy vấn sản phẩm
$sql = "SELECT product_id, product_name, disscounted_price, images 
        FROM products 
        $where 
        LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);
?>

<div class="dmsp">
    <p style="margin: 20px;">Trang chủ > <b>Kính râm</b></p>
    <h2 style="text-align: center;">Kính Râm</h2>

    <!-- Bộ lọc -->
    <form method="get">
        <input type="hidden" name="page" value="kinhram">
        <div class="filter">
            <!-- Chất liệu -->
            <select name="material_id" class="filter1" onchange="this.form.submit()">
                <option value="">Chất liệu</option>
                <?php
                $m_query = mysqli_query($conn, "SELECT * FROM Material WHERE status = 'Active'");
                while ($m = mysqli_fetch_assoc($m_query)) {
                    $selected = (isset($_GET['material_id']) && $_GET['material_id'] == $m['material_id']) ? 'selected' : '';
                    echo "<option value='{$m['material_id']}' $selected>{$m['material_name']}</option>";
                }
                ?>
            </select>

            <!-- Giá tiền -->
            <select name="price_range" class="filter2" onchange="this.form.submit()">
                <option value="">Giá tiền</option>
                <option value="0_1000000" <?php if (isset($_GET['price_range']) && $_GET['price_range'] == '0_1000000') echo 'selected'; ?>>Dưới 1 triệu</option>
                <option value="1000000_2000000" <?php if (isset($_GET['price_range']) && $_GET['price_range'] == '1000000_2000000') echo 'selected'; ?>>1 - 2 triệu</option>
                <option value="2000000_4000000" <?php if (isset($_GET['price_range']) && $_GET['price_range'] == '2000000_4000000') echo 'selected'; ?>>2 - 4 triệu</option>
                <option value="4000000_999999999" <?php if (isset($_GET['price_range']) && $_GET['price_range'] == '4000000_999999999') echo 'selected'; ?>>Trên 4 triệu</option>
            </select>
        </div>
    </form>

    <!-- Danh sách sản phẩm -->
    <div class="kinhram">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <a href="index.php?page=chitiet&id=<?= $row['product_id']; ?>" class="sp">
                <div class="ndsp">
                    <div class="anhsp">
                        <?php
                        $firstImage = $row['images'];
                        if (preg_match('#^https?://#i', $firstImage)) {
                            $imgSrc = $firstImage;
                        } else {
                            $localPath = 'imgs/products/' . $firstImage;
                            $imgSrc = file_exists($localPath) ? $localPath : 'imgs/products/default.jpg';
                        }
                        ?>
                        <img src="<?= $imgSrc ?>" alt="Ảnh sản phẩm" loading="lazy">
                    </div>
                    <p class="tensp"><?= htmlspecialchars($row['product_name']); ?></p>
                    <p class="gia" style="margin-left: 10px; margin-top:0px;">
                        <?= number_format($row['disscounted_price'], 0, ',', '.') . ' đ'; ?>
                    </p>
                </div>
            </a>
        <?php endwhile; ?>
    </div>

    <!-- Phân trang -->
    <div class="pagination" style="text-align: center; margin-top: 20px;">
        <?php
        $query_params = $_GET;
        unset($query_params['page_num']);

        if ($page > 1) {
            $query_params['page_num'] = $page - 1;
            echo '<a href="?' . http_build_query($query_params) . '" class="arrow">‹</a>';
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            $query_params['page_num'] = $i;
            $query_string = http_build_query($query_params);
            if ($i == $page) {
                echo '<span class="current">' . $i . '</span>';
            } else {
                echo '<a href="?' . $query_string . '">' . $i . '</a>';
            }
        }

        if ($page < $total_pages) {
            $query_params['page_num'] = $page + 1;
            echo '<a href="?' . http_build_query($query_params) . '" class="arrow">›</a>';
        }
        ?>
    </div>
</div>
