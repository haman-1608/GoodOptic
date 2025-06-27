<?php


//lay id goi edit
$id = $_GET['id'];

//tim trong CSDL brand co id trung
//ket noi csdl
require('./config/dbconnect.php');

$sql_str = "select * from admins where id=$id";
$res = mysqli_query($conn, $sql_str);

$admin = mysqli_fetch_assoc($res);
if (isset($_POST['btnUpdate'])) {
    //neu nut Cap nhat duoc nhan
    //lay name
    $name = $_POST['name'];
    $email = $_POST['email'];
    $userPassword = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $type = $_POST['type'];
    //thuc hien viec cap nhat
    $sql_str2 = "update admins set name='$name', email='$email', password='$userPassword', phone='$phone', address='$address', type='$type' where id=$id";

    mysqli_query($conn, $sql_str2);

    //chuyen qua trang listbrands
    header("location: viewUsers.php");
}
?>
<?php include "./header.php";
include "./sidebar.php"; ?>

<div class="">
    <div id="myModalwrapper" class="modal-wrapper">
        <h2>Cập nhật người dùng</h2><a class="close" href="viewUsers.php">&times;</a>
        <div class="content">
            <div class="modal">
                <form enctype='multipart/form-data' action="" method="POST">
                    <label for="name">Tên người dùng:</label>
                    <input type="text" class="form-control" name="name" value=<?php echo $admin['name'] ?>>
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value=<?php echo $admin['email'] ?>>
                    <label for="password">Mật khẩu:</label>
                    <input type="text" class="form-control" name="password" value=<?php echo $admin['password'] ?>>
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" class="form-control" name="phone" value=<?php echo $admin['phone'] ?>>
                    <label for="address">Địa chỉ:</label>
                    <input type="text" class="form-control" name="address" value=<?php echo $admin['address'] ?>>
                    <label for="type">Phân quyền:</label>
                    <select name="type">
                        <option value="Admin" <?= $admin['type'] === 'Admin'  ? 'selected' : '' ?>>Admin</option>
                        <option value="Staff" <?= $admin['type'] === 'Staff'  ? 'selected' : '' ?>>Staff</option>
                    </select>
                    
                    <input type="submit" value="Cập nhật" name="btnUpdate">
                </form>
            </div>
        </div>
    </div>
</div>

</div>

<?php
require('./footer.php');
?>