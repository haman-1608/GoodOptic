<?php
    // if(isset($_COOKIE)){
    //     $customer_id = intval($_COOKIE['customer_id']);
    // }
    // echo var_dump($_SESSION['cart']);

    //chỉnh sửa số lượng
    if (isset($_POST['update_quantity_id']) && isset($_POST['update_quantity_value'])) {
        $id = $_POST['update_quantity_id'];
        $quantity = max(1, intval($_POST['update_quantity_value'])); // không cho < 1

        foreach ($_SESSION['cart'] as $index => $sp) {
            if ($sp['id'] == $id) {
                $_SESSION['cart'][$index]['quantity'] = $quantity;
                break;
            }
        }
    }

    //xóa sản phẩm trong giỏ hàng
    if (isset($_POST['del_id'])) {
        $id = $_POST['del_id'];

        foreach ($_SESSION['cart'] as  $index => $sp) {
            if ($sp['id'] == $id) {
                unset($_SESSION['cart'][$index]); //xóa sản phẩm với index là chỉ số của mảng
                $_SESSION['cart'] = array_values($_SESSION['cart']); // reset key mảng sau khi unset
                break;
            }
        }
    }
    
    if(empty($_SESSION['cart'])){ 
?>

<div align = "center" style="min-height: 450px; margin-top: 80px;">
    <img style="width: 130px; height: 130px;" src="imgs/solar--cart-3-broken.svg" alt="">
    <h3 style="color: gray;">CHƯA CÓ SẢN PHẨM NÀO TRONG GIỎ</h3>
</div>

<?php 
    }
    else {
?>


<div class="giohang">
    <form class="ttvc" method="post">
        <b style="font-size: 25px;">THÔNG TIN VẬN CHUYỂN</b> <br>
        <i style="font-size: 13px;">Vui lòng nhập đầy đủ các thông tin bên dưới</i>

        <div>
            <p>Họ và tên *</p>
            <input type="text" name="hoten" id="hoten" placeholder="Họ và tên của bạn">
        </div>
        <div style="display: flex; gap: 5px">
            <div class="sdt" style="width: 52%;"> 
                <p>Số điện thoại *</p>
                <input type="text" name="dt" id="dt" placeholder="Số điện thoại của bạn">
            </div>
            <div class="email">
                <p>Email</p>
                <input type="text" name="mail" id="mail" placeholder="Email của bạn">
            </div>
        </div>
        <div class="noio" style="width: 98%;">
            <div>
                <p>Tỉnh/Thành phố *</p>
                <select name="tinh" id="tinh" style="width: 90%;">
                    <option value="">Chọn tỉnh thành</option>

                </select>
            </div>
            <div>
                <p>Quận/Huyện *</p>
                <select name="huyen" id="huyen" style="width: 90%;">
                    <option value="">Chọn huyện</option>

                </select>
            </div>
            <div>
                <p>Xã/Phường *</p>
                <select name="xa" id="xa" style="width: 90%;">
                    <option value="">Chọn xã</option>

                </select>
            </div>
        </div>
        <div>
            <p>Số nhà *</p>
            <input type="text" name="sonha" id="sonha" placeholder="Ví dụ: Số 20, Võ Oanh...">
        </div>
        <div>
            <p>Chú thích</p>
            <textarea name="note" sps="6" placeholder="Chú thích cho đơn hàng của bạn về đơn hàng hoặc về vận chuyển,..."></textarea>
        </div>
        <div class="htthanhtoan" style="margin-top: 20px;">
            <b style="font-size: 25px;">HÌNH THỨC THANH TOÁN</b>
            <label>Thanh toán khi nhận hàng<input type="radio" name="hinhthuc" id="tienmat" value="0" checked = "true"></label>
            <label>Chuyển khoản ngân hàng<input type="radio" name="hinhthuc" id="chuyenkhoan" value="1"></label>
            <p style="font-size: 10px; margin: -10px 3px; font-size: 12px;">Thông tin cá nhân của bạn được sử dụng để xử lý đơn hàng, trải nghiệm trên trang web và các mục đích khác được mô tả trong <b>chính sách bảo mật</b> của chúng tôi.</p>
            <input type="submit" name="thanhtoan" value="THANH TOÁN"></input>
        </div>
    </form>
 
    <div class="ttvc" >
        <b style="font-size: 25px;">GIỎ HÀNG</b>
        <?php $total = 0;?>
        <?php foreach ($_SESSION['cart'] as $sp): ?>
        <div class="sp_cart" style="margin-top: 25px;">
            <a style="margin-bottom: 20px;" href="index.php?page=chitiet&id=<?php echo $sp['id']; ?>" class="sp">
                <div class="ndsp" style="display: flex; flex-direction: row; gap: 30px; justify-content: flex-start;">
                    <div class="anhsp" style="width: 140px;">
                         <?php
                            $firstImage = $sp['imgs'];
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
                    <div>
                        <p class="tensp" style="width: 230px;margin: 0; font-weight: 500;"> <a href="index.php?page=chitiet&id=<?php echo $sp['id']; ?>" style="text-decoration: underline; color: black;"><?php echo $sp['name']; ?></a></p>
                        <p class="gia" style="margin-top: 20px;"><?php echo number_format($sp['price'], 0, ',', '.'). ' đ'; ?></p>
                        <form method="post" style="display: inline-block;">
                            <input type="hidden" name="update_quantity_id" value="<?php echo $sp['id']; ?>">
                            <input type="number" name="update_quantity_value" value="<?php echo $sp['quantity']; ?>" min="1" onchange="this.form.submit()">
                        </form>
                    </div>
                        <form method="post">
                            <input type="hidden" name="del_id" value="<?php echo $sp['id']; ?>">
                            <input type="submit" name="del" value="X">
                        </form>
                </div>
            </a>
        </div>
        <?php 
            $t = $sp['price'] * $sp['quantity'];
            $total += $t;?>
        <?php endforeach; ?>
        <b style="font-size: 25px;">MÃ GIẢM GIÁ</b>
        <div class="giamgia" style="display: flex; gap:10px; margin-top:20px; margin-bottom: 60px;">
            <input style="width:60%; font-size:17px;" type="text" name="magiamgia" id="magiamgia" placeholder="NHẬP MÃ GIẢM GIÁ">
            <input type="submit" name="giam" value="ÁP DỤNG"></input>
        </div>
        <div class="tien">
            <b style="font-size: 20px;">TỔNG TIỀN</b>
            <p><?php echo number_format($total, 0, ',', '.'). ' VNĐ'; ?></p>
        </div>
        <div class="tien">
            <b style="font-size: 20px;">GIẢM GIÁ</b>
            <p>100.000 VNĐ</p>
        </div>
        <div class="tien">
            <b style="font-size: 20px;">PHÍ SHIP</b>
            <p>30.000 VNĐ</p>

        </div>
        <div class="tien" style="border-top: 0.1px solid black; margin: 0; padding: 20px 0;">
            <p style="font-size: 23px; font-weight: bolder;">THÀNH TIỀN</p>
            <p>281.000 VNĐ</p>
        </div>
    </div>
</div>

    
<?php 
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const url = "https://provinces.open-api.vn/api/?depth=3";

    $.getJSON(url, function(data) {
        data.forEach(function(tinh) {
            $('#tinh').append(`<option value="${tinh.name}">${tinh.name}</option>`);
        });

        $('#tinh').on('change', function() {
            const selected = data.find(t => t.name === this.value);
            $('#huyen').html('<option>Chọn huyện</option>');
            $('#xa').html('<option>Chọn xã</option>');

            selected.districts.forEach(h => {
                $('#huyen').append(`<option value="${h.name}">${h.name}</option>`);
            });

            $('#huyen').on('change', function() {
                const dist = selected.districts.find(d => d.name === this.value);
                $('#xa').html('<option>Chọn xã</option>');
                dist.wards.forEach(x => {
                    $('#xa').append(`<option value="${x.name}">${x.name}</option>`);
                });
            });
        });
    });
</script>