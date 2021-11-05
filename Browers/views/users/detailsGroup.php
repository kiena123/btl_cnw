<?php
        session_start();
        if(!$_SESSION['id']){
        header("location: ../../login.php");
        }
        $us_id = $_SESSION["id"];
        $tm_id = $_GET["tm_id"];
        include("../../config/header.php");
        include("../../config/db.php");
?>
<?php
    include("../../config/category.php");
?>
<?php
        $sql_details_tm = $sql_tm . " where tm_id = $tm_id";
        $result_details_tm = mysqli_query($conn,$sql_details_tm);
        if(mysqli_num_rows($result_details_tm) > 0){
                $row_details_tm = mysqli_fetch_assoc($result_details_tm);
?>
        <div id="content" class="row">
                <div class="contentMain mx-3">
                        <div class="pb-4 d-flex justify-content-between border-bottom border-3">
                                <div>
                                        <h1 class="m-3"><?php echo $row_details_tm['tm_name'] ?></h1>
                                </div>
                                <button type="submit" class="btn btn-primary my-5 mx-2">
                                        <a href="./addCalendar.php?tm_id=<?php echo $row_details_tm['tm_id']; ?> ">Thêm</a>
                                </button>
                        </div>  
                        <div class="myText ms-5 my-3">
                        <?php
                                $sql_listed_mb_us = $sql_us .",member mb,team tm where us_id = mb_userid and tm.tm_id = mb.mb_teamid
                                                                and mb_teamid =". $row_details_tm["tm_id"];
                                $result_listed_mb_us =  mysqli_query($conn,$sql_listed_mb_us);
                                if($result_listed_mb_us != "0"){
                                        while($row_listed_mb_us = mysqli_fetch_assoc($result_listed_mb_us)){
                        ?>
                                <div class="text-dark"><a href="./userInfo.php?userid=<?php echo $row_listed_mb_us["us_id"]; ?>">
                                <?php echo $row_listed_mb_us["us_name"]; 
                                        if($row_listed_mb_us["tm_managerid"] == $row_listed_mb_us["mb_userid"]){
                                                echo " (Trưởng nhóm)";
                                        }
                                ?></a></div>
                        <?php
                                        }
                                }
                        ?>
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