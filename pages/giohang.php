<div class="giohang">
    <div class="ttvc">
        <b style="font-size: 25px;">THÔNG TIN VẬN CHUYỂN</b> <br>
        <i style="font-size: 13px;">Vui lòng nhập đầy đủ các thông tin bên dưới</i>

        <div>
            <p>Họ và tên *</p>
            <input type="text" name="hoten" placeholder="Họ và tên của bạn">
        </div>
        <div style="display: flex; gap: 5px">
            <div class="sdt" style="width: 52%;"> 
                <p>Số điện thoại *</p>
                <input type="text" name="dt" placeholder="Số điện thoại của bạn">
            </div>
            <div class="email">
                <p>Email</p>
                <input type="text" name="mail" placeholder="Email của bạn">
            </div>
        </div>
        <div class="noio" style="width: 98%;">
            <div>
                <p>Tỉnh/Thành phố *</p>
                <select name="job" style="width: 90%;">
                    <option value="">Chọn tỉnh thành</option>
                    <option value="hs">--Chọn quận huyện</option>
                    <option value="gv">-- Chọn xã phường</option>
                </select>
            </div>
            <div>
                <p>Quận/Huyện *</p>
                <select name="job" style="width: 90%;">
                    <option value="hs">Chọn quận huyện</option>
                    <option value="gv">Giáo viên</option>
                </select>
            </div>
            <div>
                <p>Xã/Phường *</p>
                <select name="job" style="width: 90%;">
                    <option value="hs">Chọn xã phường</option>
                    <option value="gv">Giáo viên</option>
                </select>
            </div>
        </div>
        <div>
            <p>Tên đường *</p>
            <input type="text" name="tenduong" id="tenduong" placeholder="Ví dụ: Số 20, Võ Oanh...">
        </div>
        <div>
            <p>Chú thích</p>
            <textarea name="note" rows="6" placeholder="Chú thích cho đơn hàng của bạn về đơn hàng hoặc về vận chuyển,..."></textarea>
        </div>
        <div class="htthanhtoan" style="margin-top: 20px;">
            <b style="font-size: 25px;">HÌNH THỨC THANH TOÁN</b>
            <label>Thanh toán khi nhận hàng<input type="radio" name="hinhthuc" id="tienmat" value="0" checked = "true"></label>
            <label>Chuyển khoản ngân hàng<input type="radio" name="hinhthuc" id="chuyenkhoan" value="1"></label>
            <p style="font-size: 10px; margin: -10px 3px; font-size: 12px;">Thông tin cá nhân của bạn được sử dụng để xử lý đơn hàng, trải nghiệm trên trang web và các mục đích khác được mô tả trong <b>chính sách bảo mật</b> của chúng tôi.</p>
            <button class="thanhtoan">THANH TOÁN</button>
        </div>
    </div>
    <div class="ttvc" >
        <b style="font-size: 25px;">GIỎ HÀNG</b>
        <div class="sp_cart" style="margin-top: 25px;">
            <a style="margin-bottom: 20px;" href="index.php?page=chitiet&id=<?php echo $row['product_id']; ?>" class="sp">
                <div class="ndsp" style="display: flex; flex-direction: row; gap: 30px; justify-content: flex-start;">
                    <div class="anhsp" style="width: 140px;">
                        <img src="imgs/trangchu/trongkinh.png">
                    </div>
                    <div>
                        <p class="tensp" style="margin: 0; font-weight: 500;"> <a href="" style="text-decoration: underline; color: black;">GK. GỌNG KÍNH THỜI TRANG - M3251</a></p>
                        <p class="gia" style="margin-top: 20px;">350.000 VNĐ</p>
                        <input class="solg" type="number" name="quantity" value="1" min="1"/>
                    </div>
                </div>
            </a>
        </div>
        <b style="font-size: 25px;">MÃ GIẢM GIÁ</b>
        <div class="giamgia" style="display: flex; gap:10px; margin-top:20px; margin-bottom: 60px;">
            <input style="width:60%; font-size:17px;" type="text" name="magiamgia" id="magiamgia" placeholder="NHẬP MÃ GIẢM GIÁ">
            <button class="giam" >ÁP DỤNG</button>
        </div>
        <div class="tien" style="">
            <b style="font-size: 20px;">TỔNG TIỀN</b>
            <p>351.000 VNĐ</p>
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