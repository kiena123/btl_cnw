<?php
        include('header-admin.php');
        include('../../config/db.php');
        if(isset($_POST['submit'])) {
        $id = $_POST['us_id'];
        $name = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql_update = "UPDATE user set us_name = '$name',us_email = '$email',us_phone = '$phone' where us_id = $id";
        $result_update = mysqli_query($conn,$sql_update);
        echo $result_update;
        header('location: user.php');
    }
?>

    <?php
        $sql_us = "select * from user";
        $result_us = mysqli_query($conn,$sql_us);
        if (!$conn) {
            die("Kết nối thất bại  .Kiểm tra lại các tham số    khai báo kết nối");
        }
        if(isset($_GET['userid'])) {
            $id = $_GET['userid'];

            $sql = "SELECT * from  user where us_id = $id";
            $result = mysqli_query($conn, $sql);
        }
    ?>
    
    <div id="content" class="row">
        <?php while($row = mysqli_fetch_assoc($result)){?>
        <form class="mt-4" method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Họ và Tên</label>
                <input type="text" name="username" class="form-control" id="username" value="<?php echo $row['us_name']; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email" value="<?php echo $row['us_email']; ?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $row['us_phone']; ?>">
            </div>
            <input type="hidden" name="us_id" class="form-control" id="us_id" value="<?php echo $row['us_id']; ?>">
            <button type="submit" class="btn btn-primary mt-3 mb-4" name="submit">Lưu</button>
        </form>
        <?php } ?>
        
    </div>
<?php
    include("../../config/footer.php");
?>