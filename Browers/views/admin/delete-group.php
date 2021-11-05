<?php


$conn = mysqli_connect('localhost', 'root', '', 'db_manage_website');
    if (!$conn) {
        die("Kết nối thất bại  .Kiểm tra lại các tham số    khai báo kết nối");
    }

if(isset($_GET['tm_id'])) {
    $id = $_GET['tm_id'];
    $sql = "delete from team where id = '$tm_id'";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}