<?php
    session_start();
    if(!$_SESSION['id']){
        header("location: ../../login.php");
    }
    $us_id = $_SESSION['id'];
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
                        <h1 class="ms-3">Sửa kế hoạch</h1>
                    </div>
                    <form id="processCalendar" action="../../controllers/users/processAddFix.php" method="post">
                        <div class="mb-3">
                            <span>Thuộc kế hoạch</span>
                            <select class="form-select" name="sltPlan" id="sltPlan" aria-label="Default select example" disabled>
                                <?php
                                    $sql_slt_pl = $sql_pl . " where pl_userid = $us_id and DATEDIFF(pl_deadline,CURRENT_DATE) > 0 
                                                    ORDER BY DATEDIFF(pl_deadline,CURRENT_DATE)";
                                    $result_slt_pl = mysqli_query($conn,$sql_slt_pl);
                                    // echo '<option selected value=""></option>';
                                    if(mysqli_num_rows($result_slt_pl) > 0){
                                        while($row_slt_pl = mysqli_fetch_assoc($result_slt_pl)){
                                            if($row_slt_pl["pl_id"] == $_GET["pl_id"]){
                                                $pl_id = $row_slt_pl["pl_id"];
                                                echo '<option selected value="'.$row_slt_pl['pl_id'].'">'.$row_slt_pl["pl_name"].'</option>';
                                            }else{
                                                echo '<option value="'.$row_slt_pl['pl_id'].'">'.$row_slt_pl["pl_name"].'</option>';
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="txtNamePlan" class="form-label">Tên kế hoạch</label>
                            <input type="text" name="txtNamePlan" class="form-control" id="txtNamePlan">
                        </div>
                        <div class="mb-3">
                            <label for="txtContentPlan" class="form-label">Nội dung kế hoạch</label>
                            <textarea name="txtContentPlan" id="txtContentPlan" cols="117" rows="4"></textarea>
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
                        <input type="hidden" name="type" class="form-control" id="type" value="add">
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