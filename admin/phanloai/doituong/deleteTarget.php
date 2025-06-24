
<?php

//lay id goi den
$delid = $_GET['id'];

//ket noi csdl
require('../../config/dbconnect.php');

$sql_str = "delete from targets where target_id=$delid";
mysqli_query($conn, $sql_str);

//trở về trang liệt kê targets
header("location: ../../viewTarget.php");

