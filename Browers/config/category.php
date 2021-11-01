<?php
    include("../../config/db.php");
?>

                    <div id="category" class="col col-md-3 bg-dark text-light position-fixed overflow-auto" style="height: 1000px;">
                        <div class="text-light my-3">
                            <a href="./index.php" class="text-decoration-none " style="color: #e9ecef">Trang chủ</a>
                        </div>
                        <div class="text-light my-3">
                            <a href="./calendar.php" class="text-decoration-none " style="color: #e9ecef">Lịch</a>
                        </div>
                        <div class="text-light my-3">
                            <a href="./myplan.php" class="text-decoration-none" style="color: #e9ecef">Các kế hoạch</a>
                            <ul class="category-list">
                            <?php
                                $sql_query_pl = $sql_pl . " where pl_userid = '$us_id' and  
                                                DATEDIFF(pl_deadline,CURRENT_DATE) > 0 ORDER BY DATEDIFF(pl_deadline,CURRENT_DATE)";
                                $result_pl = mysqli_query($conn,$sql_query_pl);
                                if(mysqli_num_rows($result_pl) > 0){
                                    for($i = 0;$i < 5;$i++){
                                        while($row_pl = mysqli_fetch_assoc($result_pl)){
                                            echo "<li><a class='text-danger' href='./detailsPlan.php?pl_id=".$row_pl['pl_id']."'>".$row_pl['pl_name']."</a></li>";
                                        }
                                        if(mysqli_num_rows($result_pl) > 5){
                                            echo "<li><a class='text-danger' href='./myplan.php>Xem thêm</a></li>";
                                        }
                                    }
                                }
                            ?>
                            </ul>
                        </div>
                        <div class="text-light my-3">
                            <a href="./mygroup.php" class="text-decoration-none" style="color: #e9ecef">Nhóm của bạn</a>
                            <ul class="category-list">
                                <?php
                                    $check = 0;
                                    $sql_query_tm = $sql_tm . " where tm_memberid = '$us_id'";
                                    $result_tm = mysqli_query($conn,$sql_query_tm);
                                    if(mysqli_num_rows($result_tm) > 0){
                                        while($row_tm = mysqli_fetch_assoc($result_tm)){
                                            if($check == 5){
                                                break;
                                            }else{
                                                echo "<li><a class='text-danger' href='./detailsGroup.php?tm_id=".$row_tm['tm_id']."'>".$row_tml['tm_name']."</a></li>";
                                                $check += 1;
                                            }
                                        }
                                        if(mysqli_num_rows($result_tm) > 5){
                                            echo "<li><a class='text-danger' href='./mygroup.php>Xem thêm</a></li>";
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                <!-- </div>
            </div> -->
            <!-- <div class="container-fluid">
                <div class="rows"> -->

            <!-- </div> -->
                    