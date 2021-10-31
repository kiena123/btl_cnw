<?php
    session_start();
    if(!$_SESSION["id"]){
        header("location: ../../login.php");
    }
    $us_id = $_SESSION["id"];
    include("../../config/header.php");
    include("../../config/db.php");
?>
<?php
    include("../../config/category.php");
?>
        <div id="content" class="row">
            <div id="mid" class="left">
                <img src="../../assets/images/cac-phan-mem-quan-ly-cong-viec-tot-nhat.png" class="w-100" alt="Manager">
            </div>
            <div class="right">
                

                </a></li>
                <div class="contentMain">
                    <h4>Kế hoạch gần hết hạn</h4>
                    <ul class="ms-3">
                    <?php
                        $sql_query_pl = $sql_pl . " where pl_userid = '$us_id' and  
                        DATEDIFF(pl_deadline,CURRENT_DATE) > 0 ORDER BY DATEDIFF(pl_deadline,CURRENT_DATE)";
                        $result_pl = mysqli_query($conn,$sql_query_pl);
                        if(mysqli_num_rows($result_pl) > 0){
                            while($row_pl = mysqli_fetch_assoc($result_pl)){
                                echo "<li><a class='text-danger' href='./detailsPlan.php?pl_id=".$row_pl['pl_id']."'>".$row_pl['pl_contents']."</a></li>";
                            }
                        }
                    ?>
                    </ul>
                </div>
                <div class="contentMain">
                    <h4>Thời khóa biểu trong ngày</h4>

                </div>
            </div>
        </div>

<?php
    
?>
<?php
    include("../../config/footer.php");
?>