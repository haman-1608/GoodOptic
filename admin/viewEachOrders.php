<?php


//lay id goi edit
$id = $_GET['id'];

//ket noi csdl
require('./config/dbconnect.php');

$sql_str = "select 
* from orders where order_id=$id";
// echo $sql_str; exit;   //debug cau lenh

$res = mysqli_query($conn, $sql_str);

$row = mysqli_fetch_assoc($res);

if (isset($_POST['btnUpdate'])) {
    //lay du lieu tu form
    $status = $_POST['status'];




    // cau lenh them vao bang
    $sql_str = "UPDATE `orders` 
        SET status =  '$status'
        WHERE `order_id`=$id
        ";



    //    echo $sql_str; exit;

    //thuc thi cau lenh
    mysqli_query($conn, $sql_str);

    //tro ve trang 
    header("location: viewAllOrders.php");
}
?>
<?php include "./header.php";
include "./sidebar.php"; ?>
<div class="">

    <div id="myModalwrapper" class="modal-wrapper">
        <div class="card-body p-0">
            <h2>Xem và cập nhật trạng thái đơn hàng</h2><a class="close" href="viewAllOrders.php">&times;</a>
            <div class="content">
                <div class="modal">
                    <form enctype='multipart/form-data' action="" method="POST">
                        <div style="text-align: left; font-weight: 500; font-size: 20px; margin-bottom: 10px;">
                            <span style="color: #333;">Tên khách hàng:</span>
                            <span style="color: #007bff; font-weight: 600;"><?= $row['customer_name'] ?></span>
                        </div>
                        <div style="text-align: left; font-weight: 500; font-size: 20px; margin-bottom: 10px;">
                            <span style="color: #333;">Địa chỉ:</span>
                            <span style="color: #007bff; font-weight: 600;"><?= $row['address'] ?></span>
                        </div>
                        <div style="text-align: left; font-weight: 500; font-size: 20px; margin-bottom: 10px;">
                            <span style="color: #333;">Số điện thoại:</span>
                            <span style="color: #007bff; font-weight: 600;"><?= $row['phone'] ?></span>
                        </div>
                        <div style="text-align: left; font-weight: 500; font-size: 20px; margin-bottom: 10px;">
                            <span style="color: #333;">Email:</span>
                            <span style="color: #007bff; font-weight: 600;"><?= $row['email'] ?></span>
                        </div>
                        <div style="text-align: left; font-weight: 500; font-size: 20px; margin-bottom: 10px;">
                            <span style="color: #333;">Trạng thái đơn hàng:</span>
                            <!-- 'Processing','Confirmed','Shipping','Delivered','Cancelled' -->
                            <span style="color: #007bff; font-weight: 600;">
                                <select style="font-size: 16px;" name="status" id="">
                                    <option <?= $row['status'] == 'Processing' ? 'selected' : '' ?>>Processing
                                    </option>
                                    <option <?= $row['status'] == 'Confirmed' ? 'selected' : '' ?>>Confirmed
                                    </option>
                                    <option <?= $row['status'] == 'Shipping' ? 'selected' : '' ?>>Shipping
                                    </option>
                                    <option <?= $row['status'] == 'Delivered' ? 'selected' : '' ?>>Delivered
                                    </option>
                                    <option <?= $row['status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled
                                    </option>
                                </select>
                            </span>
                        </div>
                        <button class="btn btn-primary" name="btnUpdate">Cập nhật</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h3>Chi tiết đơn hàng</h3>
                    <table class="table">
                        <tr>
                            <th>STT</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tiền</th>

                        </tr>
                        <?php
                        $sql = "select *, products.product_name as pname, order_details.price as oprice  from products, order_details where products.product_id=order_details.product_id and order_id=$id";
                        $res = mysqli_query($conn, $sql);
                        $stt = 0;
                        $tongtien = 0;
                        while ($row = mysqli_fetch_assoc($res)) {
                            $tongtien += $row['quantity'] * $row['oprice'];
                        ?>
                            <tr>
                                <td>
                                    <?= ++$stt ?>
                                </td>
                                <td>
                                    <?= $row['pname'] ?>
                                </td>
                                <td>
                                    <?= number_format($row['oprice'], 0, '', '.') . " VNĐ" ?>
                                </td>
                                <td>
                                    <?= $row['quantity'] ?>
                                </td>
                                <td>
                                    <?= number_format($row['total'], 0, '', '.') . " VNĐ" ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <br>
                    <div class="tongtien">
                        <h3>
                            Tổng tiền:
                            <?= number_format($tongtien, 0, '', '.') . " VNĐ" ?>
                        </h3>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</div>
</div>

</div>


<?php
require('./footer.php');
?>