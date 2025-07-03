<?php
$limit = 12;
$page = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
$offset = ($page - 1) * $limit;

$where = "WHERE category_id = 2 AND status = 'Active'";

// Bộ lọc loại tròng
if (!empty($_GET['refractive_id'])) {
    $refractive_id = (int)$_GET['refractive_id'];
    $where .= " AND Refractive_id = $refractive_id";
}

// Bộ lọc thương hiệu
if (!empty($_GET['brand_id'])) {
    $brand_id = (int)$_GET['brand_id'];
    $where .= " AND brand_id = $brand_id";
}

// Bộ lọc giá tiền
if (!empty($_GET['price_range'])) {
    list($min_price, $max_price) = explode('_', $_GET['price_range']);
    $where .= " AND disscounted_price BETWEEN $min_price AND $max_price";
}

// Đếm tổng sản phẩm sau khi lọc
$count_sql = "SELECT COUNT(*) AS total FROM products $where";
$count_result = mysqli_query($conn, $count_sql);
$total_row = mysqli_fetch_assoc($count_result);
$total_products = $total_row['total'];
$total_pages = ceil($total_products / $limit);

// Truy vấn sản phẩm sau khi lọc
$sql = "SELECT product_id, product_name, disscounted_price, images 
        FROM products 
        $where 
        LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);
?>

<div class="dmsp">
    <p style="margin: 20px;">Trang chủ > <b>Tròng kính</b></p>
    <h2 style="text-align: center;">Tròng Kính</h2>

    <!-- Bộ lọc -->
    <form method="get">
        <input type="hidden" name="page" value="trongkinh">
        <div class="filter">
            <!-- Loại tròng -->
            <select name="refractive_id" class="filter1" onchange="this.form.submit()">
                <option value="">Loại tròng</option>
                <?php
                $r_query = mysqli_query($conn, "SELECT * FROM Refractive WHERE status = 'Active'");
                while ($r = mysqli_fetch_assoc($r_query)) {
                    $selected = (isset($_GET['refractive_id']) && $_GET['refractive_id'] == $r['refractive_id']) ? 'selected' : '';
                    echo "<option value='{$r['refractive_id']}' $selected>{$r['refractive_name']}</option>";
                }
                ?>
            </select>

            <!-- Thương hiệu -->
            <select name="brand_id" class="filter2" onchange="this.form.submit()">
                <option value="">Thương hiệu</option>
                <?php
                $b_query = mysqli_query($conn, "SELECT * FROM brands WHERE status = 'Active'");
                while ($b = mysqli_fetch_assoc($b_query)) {
                    $selected = (isset($_GET['brand_id']) && $_GET['brand_id'] == $b['brand_id']) ? 'selected' : '';
                    echo "<option value='{$b['brand_id']}' $selected>{$b['brand_name']}</option>";
                }
                ?>
            </select>

            <!-- Giá tiền -->
            <select name="price_range" class="filter3" onchange="this.form.submit()">
                <option value="">Giá tiền</option>
                <option value="0_1000000" <?php if (isset($_GET['price_range']) && $_GET['price_range'] == '0_1000000') echo 'selected'; ?>>Dưới 1 triệu</option>
                <option value="1000000_2000000" <?php if (isset($_GET['price_range']) && $_GET['price_range'] == '1000000_2000000') echo 'selected'; ?>>1 - 2 triệu</option>
                <option value="2000000_4000000" <?php if (isset($_GET['price_range']) && $_GET['price_range'] == '2000000_4000000') echo 'selected'; ?>>2 - 4 triệu</option>
                <option value="4000000_999999999" <?php if (isset($_GET['price_range']) && $_GET['price_range'] == '4000000_999999999') echo 'selected'; ?>>Trên 4 triệu</option>
            </select>
        </div>
    </form>

    <!-- Hiển thị sản phẩm -->
    <div class="trongkinh">
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
