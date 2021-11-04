<?php
    session_start();
    if(!$_SESSION['id']){
        header("location: ../../login.php");
    }
    $us_id = $_SESSION['id'];
    if(isset($_GET["cl_id"])){
        $cl_id =  $_GET["cl_id"];
    }
    include("../../config/header.php");
    include("../../config/db.php");
    ?>
    <?php
        include("../../config/category.php");
    ?>
        <div id="content" class="row">
            <div id="mid" class="left">
                <div class="contentMain">
                    <div class="py-3 mb-3 border-bottom border-3">
                        <h1 class="ms-3">Chi tiết kế hoạch</h1>
                    </div>
                    <div>
                        <?php 
                            $sql_details_cl = $sql_cl . " where cl_id = $cl_id";
                            $result_details_cl = mysqli_query($conn,$sql_details_cl);
                            if($result_details_cl != "0"){
                                $row_details_cl = mysqli_fetch_assoc($result_details_cl);
                                $date_start = explode(" ",$row_details_cl["cl_start"]);
                                $date_end = explode(" ",$row_details_cl["cl_end"]);
                                $pl_id = $row_details_cl['cl_planid'];
                        ?>
                        <div class="mb-3">
                            <div>
                                Thuộc công ty: 
                                <?php
                                    $sql_owned_pl = $sql_pl . "where pl_id = ".$row_details_cl['cl_planid'];
                                    $result_owned_pl = mysqli_query($conn,$sql_owned_pl);
                                    if(mysqli_num_rows($result_owned_pl) > 0){
                                        $row_owned_pl = mysqli_fetch_assoc($result_owned_pl);
                                        echo $row_owned_pl['pl_name'];
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="">Tên kế hoạch: <?php echo $row_details_cl["cl_name"] ?></div>
                        </div>
                        <div class="mb-3">
                            <div class="">Nội dung kế hoạch: <?php echo $row_details_cl["cl_contents"] ?></div>
                        </div>
                        <div class="mb-3">
                            <div class="">Thời gian bắt đầu: <?php echo $date_start[1] ?></div>
                        </div>
                        <div class="mb-3">
                            <div class="">Ngày bắt đầu: <?php echo $date_start[0] ?></div>
                        </div>
                        <div class="mb-3">
                            <div class="">Thời gian kết thúc: <?php echo $date_end[1] ?></div>
                        </div>
                        <div class="mb-3">
                            <div class="">Ngày kết thúc: <?php echo $date_end[0] ?></div>
                        </div>
                        <div id="warned" class="mb-3">
                            
                        </div>
                        <button class="btn btn-primary"><a href="./fixCalendar.php?cl_id=<?php echo $cl_id?>">Sửa</a></button>
                        <button class="btn btn-primary"><a href="../../controllers/users/processDeleteCalendar.php?cl_id=<?php echo $cl_id?>">Xóa</a></button>
                        <?php
                    }
                        ?>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="contentMain">
                    <div class="py-3 mb-3 border-bottom border-3">
                        <h4 class="ms-3">Kế hoạch</h4>
                    </div>
                    <div class="ms-5">
                    <?php
                        $sql_owned_pl = $sql_pl . "where pl_id = $pl_id";
                        $result_owned_pl = mysqli_query($conn,$sql_owned_pl);
                        if(mysqli_num_rows($result_owned_pl) > 0){
                            $row_owned_pl = mysqli_fetch_assoc($result_owned_pl);
                            echo "<div>Tên kế hoạch: ".$row_owned_pl['pl_name']."</div>";
                            echo "<div>Ngày bắt đầu: ".$row_owned_pl['pl_datestart']."</div>";
                            echo "<div>Ngày kết thúc: ".$row_owned_pl['pl_deadline']."</div>";
                            echo "<div>Nội dung: ".$row_owned_pl['pl_contents']."</div>";
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>

    <script src="../../assets/js/processCalendar.js"></script>
<?php
    
?>
<?php
    include("../../config/footer.php");
?>