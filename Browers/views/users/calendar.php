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
                    <div class="d-flex justify-content-between pb-3 border-bottom border-4">
                        <div>
                            <h4>Thời gian biểu của ngày theo tuần</h4>
                            <form id="dateSearch" method="post">
                                <input id="date" type="date" name="inputDate">
                                <button type="submit" class="btn btn-primary" name="btnSearch">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                    <div class="schedule">
                        <?php
                            if(isset($_POST["btnSearch"])){
                                if($_POST['inputDate'] != ""){
                                    $date_str = $_POST['inputDate'];
                                    $date_item = explode("-",$date_str);
                                    $date_search_time = mktime(00,00,00,$date_item[1], $date_item[2], $date_item[0]);
                                    $date_search_value = getdate($date_search_time);
                                    $date_search = $date_search_value["year"]."/".$date_search_value["mon"]."/".$date_search_value["mday"];
                                }else{
                                    $date_search_value = getdate();
                                    $date_search = $date_search_value["year"]."/".$date_search_value["mon"]."/".$date_search_value["mday"];
                                }
                            }else{
                                $date_search_value = getdate();
                                $date_search = $date_search_value["year"]."/".$date_search_value["mon"]."/".$date_search_value["mday"];
                            }
                        ?>
                        <h4 class="p-2 ms-5"><?php echo $date_search; ?></h4>
                        <ul>
                            <?php
                                $sql_search_cl = $sql_cl . ",plan pl where pl.pl_userid = '$us_id' and cl.cl_planid = pl.pl_id and DATEDIFF(cl_end,'$date_search') >= 0 and
                                                                    DATEDIFF('$date_search',cl.cl_start) >= 0";
                                $result_search_cl = mysqli_query($conn,$sql_search_cl);
                                if($result_search_cl != "0"){
                                    while($row_search_cl = mysqli_fetch_assoc($result_search_cl)){

                                ?>
                                <li>
                                    <h5><a href="./detailsCalendar.php?cl_id=<?php echo $row_search_cl["cl_id"] ?>"><?php echo $row_search_cl["cl_name"] ?></a></h5>
                                    <div class="ms-4">Bắt đầu: <?php echo $row_search_cl["cl_start"] ?></div>
                                    <div class="ms-4">Kết thúc: <?php echo $row_search_cl["cl_end"] ?></div>
                                    <div class="">Nội dung: <?php echo $row_search_cl["cl_contents"] ?></div>
                                </li>
                                <?php
                                    }   
                                }else{
                                    echo "<li>Không có kế hoạch</li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="contentMain">
                    <h4>Kế hoạch còn hạn khi ngày</h4>
                    <ul class="ms-3">
                        <?php
                            $sql_query_pl = $sql_pl . " where pl_userid = '$us_id' and  
                            DATEDIFF(pl_deadline,CURRENT_DATE) > 0 ORDER BY DATEDIFF(pl_deadline,CURRENT_DATE)";
                            $result_pl = mysqli_query($conn,$sql_query_pl);
                            if(mysqli_num_rows($result_pl) > 0){
                                while($row_pl = mysqli_fetch_assoc($result_pl)){
                                    echo "<li><a class='text-danger' href='./detailsPlan.php?pl_id=".$row_pl['pl_id']."'>".$row_pl['pl_contents']."</a></li>";
                                }
                            }else{
                                echo "<li>Không có kế hoạch</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
<?php
    
?>
<?php
    include("../../config/footer.php");
?>