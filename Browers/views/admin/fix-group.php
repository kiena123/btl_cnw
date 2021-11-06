<?php 
$conn = mysqli_connect('localhost', 'root', '', 'db_manage_website');
if (!$conn) {
    die("Kết nối thất bại  .Kiểm tra lại các tham số    khai báo kết nối");
}


    if(isset($_POST['submit'])) {
        $tm_id = $_POST['id'];
        $tm_name = $_POST['name'];
        $tm_managerid = $_POST['managerid']; 

        $sql_update = "UPDATE team set tm_name = '$tm_name',tm_managerid = '$tm_managerid' where tm_id = '$tm_id'";
        mysqli_query($conn,$sql_update);
        header('location: index.php');
    }
?>


    <?php
        include('./header-admin.php');
    

        if(isset($_GET['userid'])) {
            $id = $_GET['userid'];

            $sql = "SELECT*FROM team where tm_id = '$id'";
            $result = mysqli_query($conn, $sql);
        }
    ?>
    <div id="content">
        <div class="container">
            <?php while($row = mysqli_fetch_assoc($result)){?>
            <form class="mt-4" method="POST" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $row['tm_name']; ?>">           
                </div>
                <div class="mb-3">
                    <label for="managerid" class="form-label">Mã quản lí</label>
                    <input type="text" name="managerid" class="form-control" id="managerid" value="<?php echo $row['tm_managerid']; ?>">
                </div>
                
                <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $row['tm_id']; ?>">
                <button type="submit" class="btn btn-primary mt-3 mb-4" name="submit">Save</button>
            </form>
            <?php } ?>
        </div>
    </div>
<?php 
include('../../config/footer.php');
?>