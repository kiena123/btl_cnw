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
        <div id="content" class="row">
                <?php   
                        if(isset($_POST["btnSubmit"])){
                                if($_POST["sltFilter"] == 1){
                                        $sql_search_pl  = $sql_pl . " where pl_userid = '$us_id' and  
                                        DATEDIFF(pl_deadline,CURRENT_DATE) > 0 ORDER BY DATEDIFF(pl_deadline,CURRENT_DATE)";
                                }  
                                else{
                                        $sql_search_pl  = $sql_pl . " where pl_userid = '$us_id'";
                                }
                        }else{
                                $sql_search_pl  = $sql_pl . " where pl_userid = '$us_id'";
                        }
                        $result_search_pl = mysqli_query($conn,$sql_search_pl);
                ?>
                <div id="mid">
                        <div class="contentMain">
                                <div class="border-bottom boder-3 py-2">
                                        <h1 class="mx-5 py-2">Các kế hoạch của người dùng</h1>
                                        <form action="" method="post" class="ms-5">
                                                <input type="text" name="txtSearchPlan">
                                                <select name="sltFilter" id="">
                                                        <option value="0">Tất cả</option>
                                                        <option value="1">Đang xảy ra</option>
                                                </select>
                                                <button name="btnSubmit" class="btn btn-outline-primary">OK</button>
                                        </form>
                                </div> 
                                        <?php
                                                if(mysqli_num_rows($result_search_pl) > 0){
                                                while($row_search_pl = mysqli_fetch_assoc($result_search_pl)){
                                        ?>
                                <ul class="">
                                        <li>
                                                <h4 class="m-3"><a class="text-dark" href="./detailsPlan.php?pl_id=<?php echo $row_search_pl["pl_id"]; ?>"><?php echo $row_search_pl["pl_name"]; ?></a></h4>
                                                <div class="ms-5">
                                                        <div><b>Start: </b><?php echo $row_search_pl['pl_datestart'] ?></div>
                                                        <div><b>Dateline: </b><?php echo $row_search_pl['pl_deadline'] ?></div>
                                                </div>
                                        <?php
                                        }
                                        }else{
                                                echo "<div class='m-3'>";
                                                echo "<h2 class='mt-5 mx-5'>Bạn không có kế hoạch nào</h2>";
                                                echo "</div>";
                                        }
                                        ?>
                                        </li>
                                </ul>
                        </div>
                </div>
        </div>

<?php
    
?>
<?php
    include("../../config/footer.php");
?>