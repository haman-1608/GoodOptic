<?php
$limit = 12;

$page = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;

$offset = ($page - 1) * $limit;

$count_sql = "SELECT COUNT(*) AS total FROM products WHERE category_id = 2 AND status = 'Active'";
$count_result = mysqli_query($conn, $count_sql);
$total_row = mysqli_fetch_assoc($count_result);
$total_products = $total_row['total'];
$total_pages = ceil($total_products / $limit);

$sql = "SELECT product_id, product_name, disscounted_price, images 
            FROM products 
            WHERE category_id = 2 AND status = 'Active' 
            LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);
?>
<div class="dmsp">
    <p style="margin: 20px;">Trang chủ > <b>Tròng kính</b></p>
    <h2 style="text-align: center;">Tròng Kính</h2>
    <div class="filter">
        <select class="filter1">
            <option value="">Loại tròng</option>
        </select>
        <select class="filter2">
            <option value="">Thương hiệu</option>
        </select>
        <select class="filter3">
            <option value="">Giá tiền</option>
        </select>
    </div>

    <div class="trongkinh">
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
                        <img src="<?= $imgSrc ?>" alt="Ảnh sản phẩm" loading="lazy">
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