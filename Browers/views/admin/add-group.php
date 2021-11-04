<?php 
$conn = mysqli_connect('localhost', 'root', '' ,'db_manage_website');
if (!$conn) {
    die("Kết nối thất bại  .Kiểm tra lại các tham số    khai báo kết nối");
}

    if(isset($_POST['addgr'])) {
        $tm_id = $_POST['id'];
        $tm_name = $_POST['tmname'];
        $tm_menberid = $_POST['menberid'];
        $tm_managerid = $_POST['managerid'];         
                
        $sql_insert = "INSERT into thicuoiki(id,tmname,menberid,managerid)
            values ('$tm_id','$tm_name','$tm_menberid','$tm_managerid')";
            
        $result = mysqli_query($conn,$sql_insert);
        header('location: index.php');

    }
?>

    <?php
        include('./header.php');
    ?>
    <div id="content">
    <div class="container">
        <form class="mt-4" method="POST" action="">
        <div class="mb-3">
                <label for="id" class="form-label">Mã</label>
                <input type="text" name="id" class="form-control" id="id" >
            </div>
            <div class="mb-3">
                <label for="tmname" class="form-label">Tên người dùng</label>
                <input type="text" name="tmname" class="form-control" id="tmname" >
            </div>
            <div class="mb-3">
                <label for="menberid" class="form-label">Mã thành viên</label>
                <input type="text" name="datestart" class="form-control" id="datestart" >
            </div>
            <div class="mb-3">
                <label for="managerid" class="form-label">Mã quản lí</label>
                <input type="text" name="deadline" class="form-control" id="deadline" >
            </div>            
            
            <button type="submit" class="btn btn-primary mt-3 mb-4" name="them">Add</button>
        </form>
    </div>
</div>
<?php 
include('./footer.php');
?>