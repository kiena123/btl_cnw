<?php
        session_start();
        if(!$_SESSION['id']){
        header("location: ../../login.php");
        }
        $us_id = $_SESSION["id"];
        $tm_id = $_get["userid"];
        include("../../config/header.php");
        include("../../config/db.php");
?>
<?php
    include("../../config/category.php");
?>
<?php
    $sql="SELECT * FROM team where tm_id=$tm_id " ;
    $result = mysqli_query($conn,$sql);
    <?php while($row = mysqli_fetch_assoc($result)){?>
?>
        <div id="content" class="row">
            <div class="contentMain mx-3">
                <div class="pb-4 border-bottom border-3">
                    <h1 class="m-3">Tên nhóm</h1>
                    <div><b>Trưởng nhóm: </b></div>
                    <div><b>Thành viên: </b></div>
                </div>
                <div class="myText">     
                </div>
            </div>               
        </div>

<?php
    
?>
<?php
    include("../../config/footer.php");
?>
