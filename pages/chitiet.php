<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "SELECT p.*, m.material_name , b.brand_name
                FROM products p 
                JOIN brands b ON p.brand_id = b.brand_id 
                JOIN Material m ON p.Material_id = m.material_id 
                WHERE p.product_id = $id AND p.status = 'Active' AND m.status = 'Active' AND b.status = 'Active'";
        $result = mysqli_query($conn, $sql);
        if ($result && $result->num_rows > 0) {
            $product = mysqli_fetch_assoc($result);
        } else {
            echo "<p>Sản phẩm không tồn tại.</p>";
            return;
        }
    } else {
        echo "<p>Không tìm thấy sản phẩm.</p>";
        return;
    }


?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".add button").hover(
            function() {
                $(this).css({"background-color": "white", "color": "black"});
            },
            function() {
                $(this).css({"background-color": "black", "color": "white"});
            }
        );
    
    })
</script>
<div class="chitiet" style="margin: 0 auto;">
    <div class="ctietsp">
        <div style="width: 650px;">
            <?php
                $giam_phantram = 0;
                if ($product['price'] > 0 && $product['disscounted_price'] < $product['price']) {
                $giam_phantram = 100 - ($product['disscounted_price'] / $product['price']) * 100;
                $giam_phantram = round($giam_phantram);
                }
            ?>
            <?php if ($giam_phantram > 0): ?>
            <p style="font-size: 20px;
                    z-index: 1;
                    top: 250px;
                    margin: 0;
                    border-radius: 0px 30px 30px 0px;
                    width: 100px;
                    padding: 11px 13px;
                    font-weight: bold;
                    color: white;
                    background-color: red;
                    position: absolute;">Giảm <?php echo $giam_phantram; ?>%</p>
            <?php endif; ?>
            <?php
                $firstImage = $product['images'];
                $imgSrc = htmlspecialchars($firstImage);
            ?>
            <img style="width: 100%;" src="<?php echo $imgSrc; ?>" alt="Ảnh sản phẩm" loading="lazy">
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
                    * Thương Hiệu: <?php echo $product['brand_name']; ?><br>
                    * Mã sản phẩm: <?php echo $product['product_id']; ?><br>
                    * Chất liệu: <?php echo $product['material_name']; ?><br>
                    * Giá sản phẩm: <?php echo number_format($product['price'], 0, ',', '.') . ' VNĐ'; ?><br>
                    * CẢNH BÁO: BẢO QUẢN TRONG HỘP KÍNH<br>
                    * HDSD: DÙNG ĐỂ ĐEO MẮT, TRÁNH NHIỆT ĐỘ CAO & VA CHẠM MẠNH<br>
                </p>
                <b style="font-size: 18px; margin-top: 40px;">Số lượng</b>
                <form method="post">
                    <div class="add">
                        <input type="number" name="quantity" value="1" min="1"/>
                        <button type="submit" name="add_to_cart">ADD TO CARD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $quantity = intval($_POST['quantity']);
    if ($quantity < 1) $quantity = 1;
    
    $product_id = $product['product_id'];
    $price = $product['disscounted_price'];
    
    // Kiểm tra xem sản phẩm này đã có trong giỏ chưa
    $check = $conn->prepare("SELECT cart_id, quantity FROM cart WHERE customer_id = ? AND product_id = ?");
    $check->bind_param("ii", $customer_id, $product_id);
    $check->execute();
    $checkResult = $check->get_result();

    if ($checkResult->num_rows > 0) {
        // Nếu đã có thì cập nhật số lượng
        $cartItem = $checkResult->fetch_assoc();
        $newQuantity = $cartItem['quantity'] + $quantity;

        $update = $conn->prepare("UPDATE cart SET quantity = ?, price = ? WHERE cart_id = ?");
        $update->bind_param("idi", $newQuantity, $price, $cartItem['cart_id']);
        $update->execute();
        echo "<script>alert('Cập nhật giỏ hàng thành công!');</script>";
    } else {
        // Nếu chưa có thì thêm mới
        $insert = $conn->prepare("INSERT INTO cart (customer_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $insert->bind_param("iiid", $customer_id, $product_id, $quantity, $price);
        $insert->execute();
        echo "<script>alert('Đã thêm vào giỏ hàng!');</script>";
    }

    $check->close();
}  
    ?>
    
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
                    <?php
                        $firstImage = $goiy['images'] ? trim($goiy['images']) : 'default.png';
                        $imgSrc = htmlspecialchars($firstImage);
                    ?>
                    <img src="<?php echo $imgSrc; ?>" alt="Ảnh sản phẩm" loading="lazy">
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