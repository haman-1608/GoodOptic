<?php
    $sql = "SELECT product_id, product_name, disscounted_price, images FROM products WHERE status = 'Active'";
    $result = $conn->query($sql);
?>
<div class="trangchu" style="margin: 0 auto; max-width: 1250px;">
    <div class="banner">
        <img src="imgs/trangchu/Banner.png" alt="Good Optic">
    </div>

    <div class="dichvu"> 
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

    <h2 style="margin-top: 90px; text-align:center">NHÌN RÕ HÔM NAY, TỰ TIN NGÀY MAI</h2>
    <div class="bphu">
        <div class="imgsp">
            <img src="imgs/trangchu/newbanner2.jpg" alt="">
            <div class="overclay">MỚI NHẤT </div>
        </div>
        <div  class="imgsp">
            <img src="imgs/trangchu/salebanner.jpg" alt="">
            <div class="overclay">GIÁ HỜI NHẤT</div>
        </div>
    </div>

    <h2 style="margin-top: 90px; text-align:center">SẢN PHẨM BÁN CHẠY</h2>
    <div class="banchay">
        <?php
            $loai = $_GET['loai'] ?? 'gongkinh';

            $map_category = [
                'gongkinh' => 1,
                'kinhram' => 2,
                'trongkinh' => 3
            ];

            $category_id = $map_category[$loai] ?? 1;

            // Lấy 4 sản phẩm thuộc category đang chọn
            $sql = "SELECT * FROM products WHERE category_id = $category_id LIMIT 4";
            $result = $conn->query($sql);
        ?>
        <div class="chon_spbc">
            <button class="tab_button active" data-tab="gongkinh">Gọng Kính</button>
            <button class="tab_button" data-tab="kinhram">Kính Râm</button>
            <button class="tab_button" data-tab="trongkinh">Tròng Kính</button>
        </div>
        <div class="chon_dsbc">
            <div class="tab_ds active" style="text-align: center;">
                <div class="dsbc">
                    <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <a href="index.php?page=chitiet&id=<?php echo $row['product_id']; ?>" class="sp">
                        <div class="ndsp">
                        <div class="anhsp">
                            <img src="imgs/trangchu/trongkinh.png">
                        </div>
                        <p class="tensp"><?php echo htmlspecialchars($row['product_name']); ?></p>
                        <p class="gia" style="margin-top: 0px; margin-left: 10px;"><?php echo number_format($row['disscounted_price'], 0, ',', '.'); ?> đ</p>
                        </div>
                    </a>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <p>Không có sản phẩm.</p>
                    <?php endif; ?>
                </div>
                <a href="index.php?page=danhmuc&category=<?php echo $category_id; ?>">
                <button class="xthem">Xem thêm</button>
                </a>
            </div>
        </div>        
    </div>

    <div class="store" style="margin: 0 auto; font-size: 22px; background-color:rgba(235, 228, 175, 0.35); display:flex; max-width:1250px; gap:100px; padding:0px 65px; margin-bottom: 50px;">
        <div style="height: 500px;display: flex; justify-content: center;"><img src="imgs/store.jpg" style="width:100%; height:100%;" alt="GoodOptic"></div>
        <div  style="display: flex; align-items: center; flex-direction: column;">
            <h3 style="margin-top: 80px;">HỆ THỐNG MẮT KÍNH GOOD OPTIC</h3>
            <p style="width: 680px; line-height: 1.5;">
                Hệ thống Mắt Kính Good Optic với 30+ chi nhánh trên toàn quốc, tập trung hầu hết ở các tỉnh thành lớn như: TP. Hồ Chí Minh, TP. Hà Nội, TP. Đà Nẵng, TP. Cần Thơ, TP. Hải Phòng và nhiều tỉnh thành khác.
                <br><br><br>
                <i>“Good Optic - Nhìn rõ hôm nay, tự tin ngày mai”</i>
            </p>
        </div>
    </div>
</div>


