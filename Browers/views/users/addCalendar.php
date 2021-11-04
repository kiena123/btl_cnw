<?php
    session_start();
    if(!$_SESSION['id']){
        header("location: ../../login.php");
    }
    $us_id = $_SESSION['id'];
    $pl_id = $_GET["pl_id"];
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
                        <h1 class="ms-3">Thêm khóa biểu</h1>
                    </div>
                    <form id="processCalendar" action="../../controllers/users/processAddFix.php" method="post">
                        <div class="mb-3">
                            <span>Thuộc công ty</span>
                            <select class="form-select" name="sltPlan" id="sltPlan">
                                <?php
                                    $sql_owned_pl = $sql_pl . "where pl_id = $pl_id";
                                    $result_owned_pl = mysqli_query($conn,$sql_owned_pl);
                                    if(mysqli_num_rows($result_owned_pl) > 0){
                                        $row_owned_pl = mysqli_fetch_assoc($result_owned_pl);
                                        echo "<option selected value =".$row_owned_pl["pl_id"].">".$row_owned_pl['pl_name']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="txtNameSchedule" class="form-label">Tên khóa biểu</label>
                            <input type="text" name="txtNameSchedule" class="form-control" id="txtNameSchedule">
                        </div>
                        <div class="mb-3">
                            <label for="txtContentSchedule" class="form-label">Nội dung khóa biểu</label>
                            <textarea name="txtContentSchedule" id="txtContentSchedule" cols="117" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="txtTimeStart" class="form-label">Thời gian bắt đầu</label>
                            <input type="time" name="txtTimeStart" class="form-control" id="txtTimeStart">
                        </div>
                        <div class="mb-3">
                            <label for="txtDateStart" class="form-label">Ngày bắt đầu</label>
                            <input type="date" name="txtDateStart" class="form-control" id="txtDateStart">
                        </div>
                        <div class="mb-3">
                            <label for="txtTimeEnd" class="form-label">Thời gian kết thúc</label>
                            <input type="time" name="txtTimeEnd" class="form-control" id="txtTimeEnd">
                        </div>
                        <div class="mb-3">
                            <label for="txtDateEnd" class="form-label">Ngày kết thúc</label>
                            <input type="date" name="txtDateEnd" class="form-control" id="txtDateEnd">
                        </div>
                        <div id="warned" class="mb-3">
                            
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-4" name="submit">Lưu</button>
                    </form>
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