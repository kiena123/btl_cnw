<?php 
$conn = mysqli_connect('localhost', 'root', '' ,'db_manage_website');
if (!$conn) {
    die("Kết nối thất bại  .Kiểm tra lại các tham số    khai báo kết nối");
}

    if(isset($_POST['Addpl'])) {
        $pl_id = $_POST['id'];
        $pl_userid = $_POST['userid'];
        $pl_datestart = $_POST['datestart'];
        $pl_deadline = $_POST['deadline'];
        $pl_name = $_POST['plname'];
        $pl_content = $_POST['content']; 
                
        $sql_insert = "INSERT into thicuoiki(id,userid,datestart,deadline,plname,content)
            values ('$pl_id','$pl_userid','$pl_datestart','$pl_deadline','$pl_name','$pl_content')";
            
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
                <label for="userid" class="form-label">Mã người dùng</label>
                <input type="text" name="userid" class="form-control" id="userid" >
            </div>
            <div class="mb-3">
                <label for="datestart" class="form-label">Ngày bắt đầu</label>
                <input type="text" name="datestart" class="form-control" id="datestart" >
            </div>
            <div class="mb-3">
                <label for="deadline" class="form-label">Hạn chót</label>
                <input type="text" name="deadline" class="form-control" id="deadline" >
            </div>
            <div class="mb-3">
                <label for="plname" class="form-label">Tên</label>
                <input type="text" name="plname" class="form-control" id="plname" >
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Nội dung</label>
                <input type="text" name="content" class="form-control" id="content" >
            </div>
            
            <button type="submit" class="btn btn-primary mt-3 mb-4" name="them">Add</button>
        </form>
    </div>
</div>
<?php 
include('./footer.php');
?>