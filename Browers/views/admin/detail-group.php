<?php
        session_start();
        if(!$_SESSION['id']){
        header("location: ../../login.php");
        }
        $us_id = $_SESSION["id"];
        $tm_id = $_GET["userid"];
        include("../../config/header.php");
        include("../../config/db.php");
?>
<?php
    include("../../config/category.php");
?>
<?php
    $sql="SELECT * FROM team where tm_id=$tm_id" ;
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) >0){
        $row = mysqli_fetch_assoc($result);
?>
        <div id="content" class="row">
            <div class="contentMain mx-3">
                <div class="pb-4 border-bottom border-3">
                    <h1 class="m-3">Tên nhóm: <?php echo $row["tm_name"] ?></h1>
                </div>
                <?php
                    $sql_us_tm="SELECT * FROM user us,member mb where us_id = mb_userid and mb_teamid = $tm_id";
                    $result_us_tm = mysqli_query($conn,$sql_us_tm);
                    if(mysqli_num_rows($result_us_tm) > 0){
                        while($row_us_tm = mysqli_fetch_assoc($result_us_tm)){
                        if($row_us_tm["us_id"] == $row["tm_managerid"]){
                            echo "<div><b>Trưởng nhóm: ".$row_us_tm["us_name"]." </b></div>";
                        }else{
                            echo "<div><b>Thành viên: ".$row_us_tm["us_name"]."</b></div>";
                ?>

<?php
            }
        }
    }
}
?>
</div>               
</div>
<?php
    include("../../config/footer.php");
?>
