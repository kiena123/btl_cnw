<?php 
$conn = mysqli_connect('localhost', 'root', '', 'db_manage_website');
if (!$conn) {
    die("Kết nối thất bại  .Kiểm tra lại các tham số    khai báo kết nối");
}

    if(isset($_POST['themnguoidung'])) {
        $tennd = $_POST['username'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];

        $sql_insert = "INSERT into user(us_name,us_email,us_phone)
            values ('$tennd','$email','$phone')";
            
        mysqli_query($conn,$sql_insert);
        header('location: user.php');

    }
?>

    <?php
        include('header-admin.php');
    ?>
    <?php $conn = mysqli_connect('localhost', 'root', '', 'db_manage_website');
        if (!$conn) {
            die("Kết nối thất bại  .Kiểm tra lại các tham số    khai báo kết nối");
        }
        $sql_us = "select * from user";
        $result_us = mysqli_query($conn,$sql_us);
    ?>
    <div class="container">
        <div id="content" class="row">
        <form class="mt-4" method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Họ và Tên</label>
                <input type="text" name="username" class="form-control" id="username" >
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="text" name="Email" class="form-control" id="Email" >
            </div>
            <div class="mb-3">
                <label for="Phone" class="form-label">Số điện thoại</label>
                <input type="text" name="Phone" class="form-control" id="Phone" >
            </div>
            <input type="hidden" name="us_id" class="form-control" id="us_id">
            <button type="submit" class="btn btn-dark mt-3 mb-4" name="themnguoidung">Thêm</button>
        </form>
    </div>
    <?php
    include("../../config/footer.php");
?>