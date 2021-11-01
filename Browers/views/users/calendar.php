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
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>Thời gian biểu của ngày theo tuần</h4>
                            <form id="dateSearch" method="post">
                                <input id="date" type="date" name="inputDate">
                                <button type="submit" class="btn btn-primary" name="btnDangNhap">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                    <div class="schedule">
                        <table class="table">
                            <thead>
                                <tr id="rowName">
                                    <?php
                                        if(isset($_POST['btnDangNhap'])){
                                            if($_POST['inputDate'] != ""){
                                                $date_str = $_POST['inputDate'];
                                                $date_item = explode("-",$date_str);
                                                $date_search = mktime(00,00,00,$date_item[1], $date_item[2], $date_item[0]);
                                                $date_search_value = getdate($date_search);
                                                $period = $date_search_value["wday"] - 1;
                                                if($period < 0){
                                                    $period +=7;
                                                }
                                                $date_start = mktime(00,00,00,$date_item[1], $date_item[2] - $period, $date_item[0]);
                                                $date = getdate($date_start);
                                            }else{
                                                $date_search_value = getdate();
                                                $period = $date_search_value["wday"] - 1;
                                                if($period < 0){
                                                    $period +=7;
                                                }
                                                $date_start = mktime(00,00,00,$date_search_value["mon"],$date_search_value["mday"] - $period, $date_search_value["year"]);
                                                $date = getdate($date_start);
                                            }
                                        }else{
                                                $date_search_value = getdate();
                                                $period = $date_search_value["wday"] - 1;
                                                if($period < 0){
                                                    $period +=7;
                                                }
                                                $date_start = mktime(00,00,00,$date_search_value["mon"],$date_search_value["mday"] - $period, $date_search_value["year"]);
                                                $date = getdate($date_start);
                                        }
                                        for($i = 0;$i < 7;$i++){
                                            $weekForDate = mktime(00,00,00,$date["mon"], $date["mday"] + $i, $date["year"]);
                                            $weekForDate = getdate($weekForDate);
                                            echo "<th>".$weekForDate["mday"]."/".$weekForDate["mon"]."/".$weekForDate["year"]."</th>";
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td scope="row"></td>
                                </tr> -->
                            </tbody>
                        </table>
                        
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