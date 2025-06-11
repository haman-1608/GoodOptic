<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "SELECT p.*, m.material_name 
                FROM products p 
                JOIN Material m ON p.Material_id = m.material_id 
                WHERE p.product_id = $id AND p.status = 'Active' AND m.status = 'Active'";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $product = $result->fetch_assoc();
        } else {
            echo "<p>Sản phẩm không tồn tại.</p>";
            return;
        }
    } else {
        echo "<p>Không tìm thấy sản phẩm.</p>";
        return;
    }
?>
<div class="chitiet" style="margin: 0 auto;">
    <div class="ctietsp">
        <div style="width: 650px;">
            <img width=100% src="imgs/trangchu/trongkinh.png" alt="anh_sp">
        </div>
        <div>
            <h1 style="margin-top: 0;"><?php echo $product['product_name']; ?></h1>
            <p>Mã sản phẩm: <?php echo $product['product_id']; ?></p>
            <div class="price" style="display: flex; gap: 100px; margin: 20px 0;">
                <b style="font-size: 25px;"><?php echo number_format($product['disscounted_price'], 0, ',', '.') . ' VNĐ'; ?></b>
                <i style="text-decoration: line-through; margin-top: 10px;"><?php echo number_format($product['price'], 0, ',', '.') . ' VNĐ'; ?></i>
            </div>
            <div  class="ttin">
                <p>
                    &nbsp;&nbsp;&nbsp;THÔNG TIN GỌNG KÍNH<br> 
                    * Thương Hiệu: Good Optic<br>
                    * Mã sản phẩm: <?php echo $product['product_id']; ?><br>
                    * Chất liệu: <?php echo htmlspecialchars($product['material_name']); ?><br>
                    * Giá sản phẩm: <?php echo number_format($product['price'], 0, ',', '.') . ' VNĐ'; ?><br>
                    * CẢNH BÁO: BẢO QUẢN TRONG HỘP KÍNH<br>
                    * HDSD: DÙNG ĐỂ ĐEO MẮT, TRÁNH NHIỆT ĐỘ CAO & VA CHẠM MẠNH<br>
                </p>
                <b style="font-size: 18px; margin-top: 40px;">Số lượng</b>
                <div class="add">
                    <input class="solg" type="number" name="quantity" value="1" min="1"/>
                    <button type="submit" class="cart">ADD TO CARD</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="dichvu" style="max-width: 1250px;padding: 30px; border-top: 0.5px solid black; border-bottom: 0.5px solid black; width: 90%; margin: 50px auto;"> 
        <div>
            <img src="imgs/trangchu/mdi--support 2.svg" alt="" class="">
            <p> <b>Vệ Sinh Kính Miễn Phí</b> <br>
            tại toàn bộ hệ thống mắt kính Good Optic
            </p>
        </div>
        <div>
            <img src="imgs/trangchu/carbon--delivery 1.svg" alt="" class="">
            <p> <b >Giao Hàng Nhanh</b><br>
            chỉ từ 2 ngày trên toàn quốc
            </p>
        </div>
        <div>
            <img src="imgs/trangchu/carbon--ibm-data-product-exchange 1.svg" alt="" class="">
            <p> <b>Thu Cũ Đổi Mới </b><br>
            trợ giá lên đến 200.000đ
            </p>
        </div>
        <div>
            <img src="imgs/trangchu/image 1.svg" alt="" class="">
            <p> <b>Hỗ Trợ Đo Mắt</b> <br>
            tại toàn bộ hệ thống mắt kính Good Optic
            </p>
        </div>
    </div>
    <?php
        $material_id = intval($product['Material_id']);
        $product_id = intval($product['product_id']);

        $sql_goiy = "SELECT product_id, product_name, disscounted_price, images 
                    FROM products 
                    WHERE Material_id = $material_id 
                    AND product_id != $product_id 
                    AND status = 'Active' 
                    LIMIT 4";
        $result_goiy = $conn->query($sql_goiy);
    ?>
    <div class="like" style="margin: 0 auto; max-width: 1250px;">
        <h3 style=" margin-bottom: -20px; margin-left: 30px;">CÓ THỂ BẠN CŨNG THÍCH</h3>
        <div class="goiy">
            <?php if ($result_goiy && $result_goiy->num_rows > 0): ?>
            <?php while ($goiy = $result_goiy->fetch_assoc()): ?>
        <a href="index.php?page=chitiet&id=<?php echo $goiy['product_id']; ?>" class="sp">
            <div class="ndsp">
                <div class="anhsp">
                    <img src="imgs/trangchu/trongkinh.png">
                </div>
                <p class="tensp"><?php echo htmlspecialchars($goiy['product_name']); ?></p>
                <p class="gia" style="margin-top: 0px; margin-left: 10px;"><?php echo number_format($goiy['disscounted_price'], 0, ',', '.') . ' đ'; ?></p>
            </div>
        </a>
            <?php endwhile; ?>
            <?php else: ?>
                <p>Không có sản phẩm gợi ý.</p>
            <?php endif; ?>
        </div>
    </div>
</div>