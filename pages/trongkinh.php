<?php
    $sql = "SELECT product_id, product_name, disscounted_price, images FROM products WHERE category_id = 2 AND status = 'Active'";
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
                    <img src="imgs/trangchu/trongkinh.png">
                </div>
                <p class="tensp"><?php echo htmlspecialchars($row['product_name']); ?></p>
                <p class="gia" style="margin-left: 10px; margin-top:0px;"><?php echo number_format($row['disscounted_price'], 0, ',', '.'). ' đ'; ?></p>
            </div>
        </a>
        <?php endwhile; ?>
    </div>
</div>
