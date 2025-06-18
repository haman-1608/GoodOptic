<?php
    $limit = 12;

    $page = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
    if($page < 1) $page = 1;
    $offset = ($page - 1) * $limit;

    $count_sql = "SELECT COUNT(*) AS total FROM products WHERE category_id = 2 AND status = 'Active'";
    $count_result = $conn->query($count_sql);
    $total_row = $count_result->fetch_assoc();
    $total_products = $total_row['total'];
    $total_pages = ceil($total_products / $limit);

    $sql = "SELECT product_id, product_name, disscounted_price, images 
            FROM products 
            WHERE category_id = 2 AND status = 'Active' 
            LIMIT $limit OFFSET $offset";
    $result = $conn->query($sql);
?>
<div class="dmsp">
    <p style="margin: 20px;">Trang chủ > <b>Tròng kính</b></p>
    <h2 style = "text-align: center;">Tròng Kính</h2>
    <div class="filter">
        <div class="filter1">Loại tròng</div>
        <div class="filter2">Thương hiệu</div>
        <div class="filter3">Giá tiền</div>
    </div>

    <div class="trongkinh">
        <?php
            while($row = $result -> fetch_assoc()):
        ?>
        <a href="index.php?page=chitiet&id=<?php echo $row['product_id']; ?>" class="sp">
            <div class="ndsp">
                <div class="anhsp">
                    <?php
                        $images = json_decode($row['images'], true);
                        $firstImage = isset($images[0]) ? $images[0] : 'default.png';
                    ?>
                    <img src="imgs/products/<?php echo htmlspecialchars($firstImage); ?>" alt="Ảnh sản phẩm">
                </div>
                <p class="tensp"><?php echo htmlspecialchars($row['product_name']); ?></p>
                <p class="gia" style="margin-left: 10px; margin-top:0px;"><?php echo number_format($row['disscounted_price'], 0, ',', '.'). ' đ'; ?></p>
            </div>
        </a>
        <?php endwhile; ?>
    </div>

    <div class="pagination" style="text-align: center; margin-top: 20px;">
        <?php
            $adjacents = 2;
            $start = max(1, $page - $adjacents);
            $end = min($total_pages, $page + $adjacents);

            if ($page > 1) {
                echo '<a href="?page=trongkinh&page_num=' . ($page - 1) . '" class="arrow">‹</a>';
            }

            // Hiển thị tất cả các trang
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    echo '<span class="current">' . $i . '</span>'; // Trang hiện tại
                } else {
                    echo '<a href="?page=trongkinh&page_num=' . $i . '">' . $i . '</a>';
                }
            }

            // Nút "›" tiến tới nếu không phải trang cuối
            if ($page < $total_pages) {
                echo '<a href="?page=trongkinh&page_num=' . ($page + 1) . '" class="arrow">›</a>';
            }
        ?>
    </div>
</div>
