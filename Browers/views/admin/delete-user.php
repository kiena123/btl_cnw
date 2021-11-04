<?php

$conn = mysqli_connect('localhost', 'root', '', 'db_manage_website');
    if (!$conn) {
        die("Kết nối thất bại  .Kiểm tra lại các tham số    khai báo kết nối");
    }

if(isset($_GET['userid'])) {
    $id = $_GET['userid'];
    $sql = "delete from user where us_id = '$id'";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}