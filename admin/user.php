<?php

function mysqli_query_one($sql, ...$params) {
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat("s", count($params)), ...$params); // giả sử toàn bộ tham số là kiểu string
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}


function checkuser($name, $password) {
    $sql = "SELECT * FROM admins WHERE name = ? AND password = ?";
    return mysqli_query_one($sql, $name, $password);
}

?>