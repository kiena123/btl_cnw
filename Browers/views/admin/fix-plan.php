<?php 
$conn = mysqli_connect('localhost', 'root', '', 'db_manage_website');
if (!$conn) {
    die("Kết nối thất bại  .Kiểm tra lại các tham số  khai báo kết nối");
}


    if(isset($_POST['submit'])) {
        $pl_id = $_POST['id'];
        $pl_userid = $_POST['userid'];
        $pl_datestart = $_POST['datestart'];
        $pl_deadline = $_POST['deadline'];
        $pl_name = $_POST['name'];
        $pl_content = $_POST['content']; 
                 
        $sql_update = "UPDATE plan set pl_userid = $pl_userid,pl_datestart = '$pl_datestart',pl_deadline = '$pl_deadline',pl_name ='$pl_name',pl_contents =$pl_content where pl_id = $pl_id";
        mysqli_query($conn,$sql_update);
        header('location: index.php');
    }
?>


    <?php
        include("header-admin.php");
    ?>
    <?php $conn = mysqli_connect('localhost', 'root', '', 'db_manage_website');
        $sql_pl = "select * from plan";
        $result_pl = mysqli_query($conn,$sql_pl);
        if (!$conn) {
            die("Kết nối thất bại  .Kiểm tra lại các tham số    khai báo kết nối");
        }
        if(isset($_GET['pl_id'])) {
            $id = $_GET['pl_id'];

            $sql = "SELECT * from  plan where pl_id = '$id'";
            $result = mysqli_query($conn, $sql);
        }
    ?>
    <div id="content">

        <div class="container">
            <?php while($row = mysqli_fetch_assoc($result)){?>
            <form class="mt-4" method="POST" action="">
                <div class="mb-3">
                    <label for="userid" class="form-label">Mã người sử dụng</label>
                    <input type="text" name="userid" class="form-control" id="userid" value="<?php echo $row['pl_userid']; ?>">
                </div>
                <div class="mb-3">
                    <label for="datestart" class="form-label">Ngày bắt đầu</label>
                    <input type="text" name="datestart" class="form-control" id="datestart" value="<?php echo $row['pl_datestart']; ?>">
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">Hạn chót</label>
                    <input type="text" name="deadline" class="form-control" id="deadline" value="<?php echo $row['pl_deadline']; ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Tên</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $row['pl_name']; ?>">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung</label>
                    <input type="text" name="content" class="form-control" id="content" value="<?php echo $row['pl_contents']; ?>">
                </div>
                <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $row['pl_id']; ?>">
                <button type="submit" class="btn btn-primary mt-3 mb-4" name="submit">Lưu</button>
            </form>
            <?php } ?>
        </div>
    </div>
<?php
    include("../../config/footer.php");
?>