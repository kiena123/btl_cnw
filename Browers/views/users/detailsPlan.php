<?php
        session_start();
        if(!$_SESSION['id']){
                header("location: ../../login.php");
        }
        $us_id = $_SESSION["id"];
    include("../../config/header.php");
    include("../../config/db.php");
?>
<?php
    include("../../config/category.php");
?>
<?php
        $sql_details_pl = $sql_pl . " where pl_userid = $us_id";
        $result_details_pl = mysqli_query($conn,$sql_details_pl);
        if(mysqli_num_rows($result_details_pl) > 0){
                $row_details_pl = mysqli_fetch_assoc($result_details_pl);
?>
        <div id="content" class="row">
                <div class="contentMain mx-3">
                        <div class="pb-4 d-flex justify-content-between border-bottom border-3">
                                <div>
                                        <h1 class="m-3"><?php echo $row_details_pl['pl_name'] ?></h1>
                                        <div><b>Start: </b><?php echo $row_details_pl['pl_datestart'] ?></div>
                                        <div><b>Dateline: </b><?php echo $row_details_pl['pl_deadline'] ?></div>
                                </div>
                                <button type="submit" class="btn btn-primary my-5 mx-2">
                                        <a href="./addCalendar.php?pl_id=<?php echo $row_details_pl['pl_id']; ?> ">Thêm</a>
                                </button>
                        </div>  
                        <div class="myText">
                                <h4>Nội dung: </h4>
                                <div class="ms-4">
                                        <?php echo $row_details_pl['pl_contents'] ?>
                                </div>
                        </div>
                </div>
        </div>
                <!-- <form action="" method="post">
                        <input type="text" name="txtSearchPlan">
                        <select name="sltFilter" id="">
                                <option value="0">Tất cả</option>
                                <option value="1">Đang xảy ra</option>
                        </select>
                        <button name="btnSubmit" class="btn btn-outline-primary">OK</button>
                </form>
                <div id="mid">
                        <div class="contentMain">
                                <h4>Kế hoạch 1</h4>
                        </div>
                        <div class="contentMain">
                                <h4>Kế hoạch 2</h4>
                        </div>
                        <div class="contentMain">
                                <h4>Kế hoạch 3</h4>
                        </div>
                        <div class="contentMain">
                                <h4>Kế hoạch 4</h4>
                        </div>
                        <div class="contentMain">
                                <h4>Kế hoạch 5</h4>
                        </div>
                </div> -->
        </div>
        
        <?php
        }               
    
?>
<?php
    include("../../config/footer.php");
?>